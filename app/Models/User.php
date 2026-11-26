<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory;

    protected $table = 'user';  // Nama tabel yang digunakan
    protected $primaryKey = 'id_user';  // Mengatur primary key menjadi 'id_user'
    public $incrementing = true;  // Menetapkan bahwa primary key adalah auto-increment
    protected $keyType = 'int';  // Tipe data primary key (integer)

        protected $fillable = [
        'nama_user', 'username', 'password', 'email', 'id_jenis_user'];

        // Menambahkan relasi dengan jenis_user
    public function jenisUser()
    {
        return $this->belongsTo(JenisUser::class, 'id_jenis_user', 'id_jenis_user');
    }
}
