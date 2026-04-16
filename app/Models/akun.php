<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class akun extends Model
{
    protected $guarded = ['id'];

    protected $table = 'akun';

    public function mahasiswa()
    {
        return $this->hasOne(mahasiswa::class, 'student_id', 'student_id');
    }
}
