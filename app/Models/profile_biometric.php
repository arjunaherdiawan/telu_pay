<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfileBiometric extends Model
{
    protected $table = 'profile_biometric';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'biometric_id',
        'student_id',
        'username',
        'template_biometric',
        'enrolled',
        'active',
    ];

    // ProfileBiometric belongs to one Mahasiswa
    public function mahasiswa()
    {
        return $this->belongsTo(mahasiswa::class, 'student_id', 'student_id');
    }
}
