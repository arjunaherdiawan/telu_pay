<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $table = 'order_item';
    protected $primaryKey = 'order_item_id';
    public $timestamps = false;

    protected $fillable = [
        'order_item_id',
        'order_id',
        'item_id',
        'quantity',
        'harga_satuan',
        'subtotal',
    ];

    // OrderItem belongs to one Order
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'order_id');
    }

    // OrderItem belongs to one MenuItem
    public function menuItem()
    {
        return $this->belongsTo(MenuItem::class, 'item_id', 'item_id');
    }
}
