<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TopupRequest extends Model
{
    protected $table = 'topup_request';
    protected $primaryKey = 'withdrawal_id'; // Based on topup_request migration
    public $timestamps = false;

    protected $fillable = [
        'withdrawal_id',
        'merchant_id',
        'approved_by',
        'jumlah',
        'bukti_pembayaran',
        'pesan',
        'status',
        'created_at',
        'updated_at',
    ];

    // TopupRequest belongs to one Merchant
    public function merchant()
    {
        return $this->belongsTo(Merchant::class, 'merchant_id', 'merchant_id');
    }

    // TopupRequest approved by one Admin
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'approved_by', 'admin_id');
    }
}
