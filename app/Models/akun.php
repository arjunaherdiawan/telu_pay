<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class akun extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $table = 'akun';
    protected $primaryKey = 'account_id';
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $fillable = [
        'account_id',
        'student_id',
        'username',
        'password',
        'created_at',
        'last_login',
    ];

    protected $hidden = [
        'password',
    ];

    // Akun belongs to one Mahasiswa
    public function mahasiswa()
    {
        return $this->belongsTo(mahasiswa::class, 'student_id', 'student_id');
    }

    // Akun has one Wallet
    public function wallet()
    {
        return $this->hasOne(wallet::class, 'account_id', 'account_id');
    }

    // Akun has one Admin (jika akun ini adalah admin)
    public function admin()
    {
        return $this->hasOne(Admin::class, 'account_id', 'account_id');
    }

    // Akun has one Merchant (jika akun ini adalah merchant)
    public function merchant()
    {
        return $this->hasOne(Merchant::class, 'account_id', 'account_id');
    }

    // Akun has one TerminalMerchant (jika akun ini adalah terminal)
    public function terminalMerchant()
    {
        return $this->hasOne(TerminalMerchant::class, 'account_id', 'account_id');
    }

    // Akun has many AuditLog
    public function auditLogs()
    {
        return $this->hasMany(AuditLog::class, 'account_id', 'account_id');
    }
}

