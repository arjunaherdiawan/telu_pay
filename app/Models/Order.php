<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'order_id';
    public $timestamps = false;

    protected $fillable = [
        'order_id',
        'wallet_id',
        'terminal_id',
        'total_harga',
        'status',
        'created_at',
    ];

    // Order belongs to one Wallet (mahasiswa)
    public function wallet()
    {
        return $this->belongsTo(Wallet::class, 'wallet_id', 'wallet_id');
    }

    // Order belongs to one TerminalMerchant
    public function terminal()
    {
        return $this->belongsTo(TerminalMerchant::class, 'terminal_id', 'terminal_id');
    }

    // Order has many OrderItem
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'order_id', 'order_id');
    }
}
