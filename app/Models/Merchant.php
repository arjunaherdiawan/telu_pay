<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Merchant extends Model
{
    protected $table = 'merchant';
    protected $primaryKey = 'merchant_id';
    public $timestamps = false;

    protected $fillable = [
        'merchant_id',
        'account_id',
        'nama_merchant',
        'nama_kontak',
        'nomor_kontak',
        'lokasi',
        'konter_hp',
        'created_at',
    ];

    // Merchant belongs to one Akun
    public function akun()
    {
        return $this->belongsTo(Akun::class, 'account_id', 'account_id');
    }

    // Merchant has one MerchantWallet
    public function wallet()
    {
        return $this->hasOne(MerchantWallet::class, 'merchant_id', 'merchant_id');
    }

    // Merchant has many TerminalMerchant
    public function terminals()
    {
        return $this->hasMany(TerminalMerchant::class, 'merchant_id', 'merchant_id');
    }

    // Merchant has many MenuItem
    public function menuItems()
    {
        return $this->hasMany(MenuItem::class, 'merchant_id', 'merchant_id');
    }

    // Merchant has many TopupRequest
    public function topupRequests()
    {
        return $this->hasMany(TopupRequest::class, 'merchant_id', 'merchant_id');
    }

    // Merchant has many WithdrawalRequest
    public function withdrawalRequests()
    {
        return $this->hasMany(WithdrawalRequest::class, 'merchant_id', 'merchant_id');
    }
}
