<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class mahasiswa extends Model
{
    protected $table = 'mahasiswa';
    protected $primaryKey = 'student_id';
    public $timestamps = true;

    protected $guarded = ['student_id'];

    protected $fillable = [
        'nim',
        'nama_lengkap',
        'email',
        'nomer_hp',
        'fakultas',
        'prodi',
    ];

    // Mahasiswa has one Akun
    public function akun()
    {
        return $this->hasOne(akun::class, 'student_id', 'student_id');
    }

    // Mahasiswa has one ProfileBiometric
    public function profileBiometric()
    {
        return $this->hasOne(ProfileBiometric::class, 'student_id', 'student_id');
    }

    public function getRouteKeyName(): string
    {
        return 'student_id';
    }
}
