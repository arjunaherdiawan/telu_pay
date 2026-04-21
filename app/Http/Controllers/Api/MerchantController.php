<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Merchant;
use App\Models\MenuItem;
use Illuminate\Http\Request;

class MerchantController extends Controller
{
    /**
     * List all merchants.
     */
    public function index()
    {
        $merchants = Merchant::all();
        return response()->json($merchants);
    }

    /**
     * Show merchant details.
     */
    public function show($id)
    {
        $merchant = Merchant::where('merchant_id', $id)->first();

        if (!$merchant) {
            return response()->json(['message' => 'Merchant not found'], 404);
        }

        return response()->json($merchant);
    }

    /**
     * List menu items for a specific merchant.
     */
    public function menu($merchant_id)
    {
        $merchant = Merchant::where('merchant_id', $merchant_id)->first();

        if (!$merchant) {
            return response()->json(['message' => 'Merchant not found'], 404);
        }

        $menuItems = MenuItem::where('merchant_id', $merchant_id)
            ->where('is_available', 1)
            ->get();

        return response()->json($menuItems);
    }

    /**
     * Search for menu items across all merchants.
     */
    public function search(Request $request)
    {
        $query = $request->query('q');

        if (!$query) {
            return response()->json(['message' => 'Query parameter q is required'], 400);
        }

        $items = MenuItem::where('nama_item', 'LIKE', "%{$query}%")
            ->where('is_available', 1)
            ->with('merchant')
            ->get();

        return response()->json($items);
    }
}
