<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $table = 'mahasiswa';

    protected $fillable = [
        'user_id',
        'nim',
        'nama_mahasiswa',
        'jenis_kelamin',
        'alamat_mhs',
        'id_kelas',
    ];

}
