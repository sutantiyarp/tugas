<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisUser extends Model
{
    use HasFactory;

    protected $table = 'jenis_user'; // Nama tabel di database
    protected $primaryKey = 'id_jenis_user'; // Primary key
    protected $keyType = 'string'; // Karena primary key bertipe string

    protected $fillable = [
        'id_jenis_user',
        'jenis_user', // Kolom yang bisa diisi
    ];

    public $timestamps = true; // Pastikan Laravel mengelola created_at dan updated_at

        public function users()
    {
        return $this->hasMany(User::class, 'id_jenis_user', 'id_jenis_user');
    }
}
