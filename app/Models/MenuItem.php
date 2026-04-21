<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    protected $table = 'menu_item';
    protected $primaryKey = 'item_id';
    public $timestamps = false;

    protected $fillable = [
        'item_id',
        'merchant_id',
        'nama_item',
        'harga',
        'kategori',
        'is_available',
        'deskripsi',
        'created_at',
    ];

    // MenuItem belongs to one Merchant
    public function merchant()
    {
        return $this->belongsTo(Merchant::class, 'merchant_id', 'merchant_id');
    }

    // MenuItem has many OrderItem
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'item_id', 'item_id');
    }
}
