<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\MenuItem;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    /**
     * Place a new order and process payment.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'terminal_id' => 'required|exists:terminal_merchant,terminal_id',
            'items' => 'required|array|min:1',
            'items.*.item_id' => 'required|exists:menu_item,item_id',
            'items.*.quantity' => 'required|integer|min:1',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = $request->user();
        $wallet = $user->wallet;

        if (!$wallet) {
            return response()->json(['message' => 'Wallet not found for this account'], 404);
        }

        DB::beginTransaction();
        try {
            $totalHarga = 0;
            $itemsToProcess = [];

            // 1. Calculate Total and Validate Items
            foreach ($request->items as $itemData) {
                $menuItem = MenuItem::where('item_id', $itemData['item_id'])->first();
                
                if (!$menuItem->is_available) {
                    return response()->json(['message' => "Item '{$menuItem->nama_item}' is not available"], 400);
                }

                $subtotal = $menuItem->harga * $itemData['quantity'];
                $totalHarga += $subtotal;

                $itemsToProcess[] = [
                    'menu_item' => $menuItem,
                    'quantity' => $itemData['quantity'],
                    'subtotal' => $subtotal
                ];
            }

            // 2. Check Balance
            if ($wallet->saldo < $totalHarga) {
                return response()->json(['message' => 'Insufficient balance'], 400);
            }

            // 3. Create Order
            $order = Order::create([
                'wallet_id' => $wallet->wallet_id,
                'terminal_id' => $request->terminal_id,
                'total_harga' => $totalHarga,
                'status' => 'PAID', // In this simple flow, we process payment immediately
                'created_at' => now(),
            ]);

            // 4. Create Order Items
            foreach ($itemsToProcess as $item) {
                OrderItem::create([
                    'order_id' => $order->order_id,
                    'item_id' => $item['menu_item']->item_id,
                    'quantity' => $item['quantity'],
                    'harga_satuan' => $item['menu_item']->harga,
                    'subtotal' => $item['subtotal'],
                ]);
            }

            // 5. Update Wallet Balance
            $saldoSebelum = $wallet->saldo;
            $wallet->saldo -= $totalHarga;
            $wallet->update_at = now();
            $wallet->save();

            // 6. Create Transaction Log
            Transaksi::create([
                'wallet_id' => $wallet->wallet_id,
                'terminal_id' => $request->terminal_id,
                'tipe' => 'PAYMENT',
                'jumlah' => $totalHarga,
                'saldo_sebelum' => $saldoSebelum,
                'saldo_sesudah' => $wallet->saldo,
                'deskripsi' => "Payment for Order #{$order->order_id}",
                'timestamp' => now(),
                'status_transaksi' => 'SUCCESS',
                'reference_id' => $order->order_id,
            ]);

            DB::commit();

            return response()->json([
                'message' => 'Order placed successfully',
                'order' => $order->load('orderItems.menuItem'),
                'new_balance' => $wallet->saldo
            ], 201);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Order failed', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Get order history for the authenticated user.
     */
    public function history(Request $request)
    {
        $wallet = $request->user()->wallet;

        if (!$wallet) {
            return response()->json(['orders' => []]);
        }

        $orders = Order::where('wallet_id', $wallet->wallet_id)
            ->with('orderItems.menuItem')
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json($orders);
    }
}
