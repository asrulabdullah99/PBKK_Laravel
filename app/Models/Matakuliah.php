<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{
    use HasFactory;
    protected $table = 'matakuliah';

    protected $fillable = [
        'nama_matakuliah',
    ];

    public function dataTambahanJadwal(){
        return $this->hasMany(Jadwal::class, 'id_jadwal');
    }

}
