<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AuditLog extends Model
{
    protected $table = 'audit_log';
    protected $primaryKey = 'audit_log_id';
    public $timestamps = false;

    protected $fillable = [
        'auditor_id',
        'account_id',
        'event_type',
        'deskripsi',
        'timestamp_audit',
    ];

    // AuditLog belongs to one Admin (auditor)
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'auditor_id', 'id');
    }

    // AuditLog belongs to one Akun (target account)
    public function akun()
    {
        return $this->belongsTo(Akun::class, 'account_id', 'account_id');
    }
}
