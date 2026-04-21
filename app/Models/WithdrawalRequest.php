<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WithdrawalRequest extends Model
{
    protected $table = 'withdrawal_request';
    protected $primaryKey = 'withdrawal_id';
    public $timestamps = false;

    protected $fillable = [
        'withdrawal_id',
        'merchant_id',
        'approved_by',
        'jumlah',
        'status',
        'created_at',
        'updated_at',
    ];

    // WithdrawalRequest belongs to one Merchant
    public function merchant()
    {
        return $this->belongsTo(Merchant::class, 'merchant_id', 'merchant_id');
    }

    // WithdrawalRequest approved by one Admin
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'approved_by', 'admin_id');
    }
}
