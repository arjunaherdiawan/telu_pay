<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use App\Models\TopupRequest;
use App\Models\WithdrawalRequest;
use App\Models\AuditLog;
use App\Models\Merchant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WalletController extends Controller
{
    /**
     * Get the current balance of the authenticated user's wallet.
     */
    public function balance(Request $request)
    {
        $wallet = $request->user()->wallet;

        if (!$wallet) {
            return response()->json(['balance' => 0, 'mata_uang' => 'IDR']);
        }

        return response()->json([
            'balance' => $wallet->saldo,
            'mata_uang' => $wallet->mata_uang
        ]);
    }

    /**
     * Get the transaction history for the authenticated user's wallet.
     */
    public function transactions(Request $request)
    {
        $wallet = $request->user()->wallet;

        if (!$wallet) {
            return response()->json(['data' => []]);
        }

        $transactions = $wallet->transaksi()
            ->orderBy('timestamp', 'desc')
            ->paginate(10);

        return response()->json($transactions);
    }

    /**
     * Submit a top-up request.
     */
    public function topup(Request $request)
    {
        $user = $request->user();
        
        $validator = Validator::make($request->all(), [
            'jumlah' => 'required|numeric|min:1000',
            'bukti_pembayaran' => 'nullable|string', // Could be base64 or file path
            'pesan' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Check if user is a merchant to use topup_request table
        $merchant = Merchant::where('account_id', $user->account_id)->first();
        
        if ($merchant) {
            $topup = TopupRequest::create([
                'merchant_id' => $merchant->merchant_id,
                'jumlah' => $request->jumlah,
                'bukti_pembayaran' => $request->bukti_pembayaran,
                'pesan' => $request->pesan,
                'status' => 'PENDING',
                'created_at' => now(),
            ]);

            $this->logEvent($user->account_id, 'TOPUP_REQUEST', "Requested topup of {$request->jumlah}");

            return response()->json([
                'message' => 'Topup request submitted successfully',
                'data' => $topup
            ], 201);
        }

        return response()->json(['message' => 'Topup currently only available for merchants'], 403);
    }

    /**
     * Submit a withdrawal request.
     */
    public function withdraw(Request $request)
    {
        $user = $request->user();
        $wallet = $user->wallet;

        if (!$wallet) {
            return response()->json(['message' => 'Wallet not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'jumlah' => 'required|numeric|min:10000',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        if ($wallet->saldo < $request->jumlah) {
            return response()->json(['message' => 'Insufficient balance'], 400);
        }

        // Check if user is a merchant
        $merchant = Merchant::where('account_id', $user->account_id)->first();

        if ($merchant) {
            $withdrawal = WithdrawalRequest::create([
                'merchant_id' => $merchant->merchant_id,
                'jumlah' => $request->jumlah,
                'status' => 'PENDING',
                'created_at' => now(),
            ]);

            $this->logEvent($user->account_id, 'WITHDRAWAL_REQUEST', "Requested withdrawal of {$request->jumlah}");

            return response()->json([
                'message' => 'Withdrawal request submitted successfully',
                'data' => $withdrawal
            ], 201);
        }

        return response()->json(['message' => 'Withdrawal currently only available for merchants'], 403);
    }

    /**
     * Helper to log audit events.
     */
    private function logEvent($accountId, $type, $desc)
    {
        AuditLog::create([
            'account_id' => $accountId,
            'event_type' => $type,
            'deskripsi' => $desc,
            'timestamp_audit' => now(),
        ]);
    }
}
