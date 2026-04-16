<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class mahasiswa extends Model
{
    protected $guarded = ['id'];

    protected $table = ['mahasiswa'];

    protected $fillable = [
        'nim',
        'nama_lengkap',
        'email',
        'nomer_hp',
        'fakultas',
        'prodi',
    ];

    public function akun()
    {
        return $this->hasOne(akun::class, 'account_id', 'account_id' );
    }
    public function getRouteKeyname(): string
    {
        return 'student_id';
    }
}
