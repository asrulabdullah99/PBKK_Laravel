<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    protected $table = 'dosen';

    protected $fillable = [
        'user_id',
        'nama_dosen',
        'nidn',
        'jenis_kelamin',
    ];

    protected $primaryKey = 'nidn';

    public function user(){
        return $this->belongsTo(User::class);
    }
    
}
