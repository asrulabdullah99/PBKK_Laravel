<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'level',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // //relationship
    public function dataTambahanDosen(){
        return $this->hasOne(Dosen::class,'user_id')->orderby('nidn','asc');
    }
        // relationship
    public function dataTambahanMahasiswa(){
        return $this->hasOne(Mahasiswa::class,'user_id')->orderby('nim','asc');
    }

    // protected function level(): Attribute
    // {
    //     return new Attribute(
    //         get: fn ($value) =>  ["admin", "dosen", "mahasiswa"][$value],
    //     );
    // }
}
