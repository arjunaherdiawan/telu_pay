<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TerminalMerchant extends Model
{
    protected $table = 'terminal_merchant';
    protected $primaryKey = 'terminal_id';
    public $timestamps = false;

    protected $fillable = [
        'terminal_id',
        'merchant_id',
        'account_id',
        'nama_terminal',
        'lokasi_detail',
        'status',
    ];

    // Terminal belongs to one Merchant
    public function merchant()
    {
        return $this->belongsTo(Merchant::class, 'merchant_id', 'merchant_id');
    }

    // Terminal has many Transaksi
    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'terminal_id', 'terminal_id');
    }

    // Terminal has many Orders
    public function orders()
    {
        return $this->hasMany(Order::class, 'terminal_id', 'terminal_id');
    }
}
