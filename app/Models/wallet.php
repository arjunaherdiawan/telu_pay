<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class wallet extends Model
{
    protected $table = 'wallet';
    protected $primaryKey = 'wallet_id';
    public $timestamps = false;

    protected $fillable = [
        'wallet_id',
        'account_id',
        'saldo',
        'mata_uang',
        'update_at',
        'created_at',
    ];

    // Wallet belongs to one Akun
    public function akun()
    {
        return $this->belongsTo(akun::class, 'account_id', 'account_id');
    }

    // Wallet has many Transaksi
    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'wallet_id', 'wallet_id');
    }

    // Wallet has many Orders
    public function orders()
    {
        return $this->hasMany(Order::class, 'wallet_id', 'wallet_id');
    }
}
