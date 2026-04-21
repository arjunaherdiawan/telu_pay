<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'admins';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'admin_id',
        'account_id',
        'username',
        'created_at',
    ];

    // Admin belongs to one Akun
    public function akun()
    {
        return $this->belongsTo(Akun::class, 'account_id', 'account_id');
    }

    // Admin has many AuditLog
    public function auditLogs()
    {
        return $this->hasMany(AuditLog::class, 'auditor_id', 'id');
    }

    // Admin can approve many TopupRequest
    public function topupRequests()
    {
        return $this->hasMany(TopupRequest::class, 'approved_by', 'admin_id');
    }

    // Admin can approve many WithdrawalRequest
    public function withdrawalRequests()
    {
        return $this->hasMany(WithdrawalRequest::class, 'approved_by', 'admin_id');
    }
}
