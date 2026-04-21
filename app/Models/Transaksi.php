<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey = 'transaksi_id';
    public $timestamps = false;

    protected $fillable = [
        'transaksi_id',
        'wallet_id',
        'terminal_id',
        'tipe',
        'jumlah',
        'saldo_sebelum',
        'saldo_sesudah',
        'deskripsi',
        'timestamp',
        'status_transaksi',
        'reference_id',
    ];

    // Transaksi belongs to one Wallet (mahasiswa)
    public function wallet()
    {
        return $this->belongsTo(Wallet::class, 'wallet_id', 'wallet_id');
    }

    // Transaksi belongs to one TerminalMerchant (nullable)
    public function terminal()
    {
        return $this->belongsTo(TerminalMerchant::class, 'terminal_id', 'terminal_id');
    }
}
