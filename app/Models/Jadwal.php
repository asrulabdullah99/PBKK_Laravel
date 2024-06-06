<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $table = 'jadwal';

    protected $fillable = [
        'id_matkul',
        'id_kelas',
        'id_dosen',
        'waktu',
        'hari',
    ];

    protected $primaryKey = 'id_jadwal';

    public function dosen(){
        return $this->belongsTo(Dosen::class, 'id_dosen');
    }

    public function kelas(){
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }

    public function matakuliah(){
        return $this->belongsTo(Matakuliah::class, 'id_matkul');
    }


}
