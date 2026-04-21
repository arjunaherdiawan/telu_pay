<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MerchantWallet extends Model
{
    protected $table = 'merchant_wallet';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'wallet_id',
        'merchant_id',
        'saldo',
        'mata_uang',
        'update_at',
        'created_at',
    ];

    // MerchantWallet belongs to one Merchant
    public function merchant()
    {
        return $this->belongsTo(Merchant::class, 'merchant_id', 'merchant_id');
    }
}
