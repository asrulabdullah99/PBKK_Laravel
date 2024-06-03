<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    protected $table = 'kelas';

    protected $fillable = [
        'nama_kelas',
    ];


    public function dataTambahanMahasiswa(){
        return $this->hasOne(Mahasiswa::class,'id_kelas');
    }
}
