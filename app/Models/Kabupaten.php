<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kabupaten extends Model
{
    use HasFactory;

    protected $table = 'kabupaten';
    protected $primaryKey = 'regency_id';

    protected $fillable = ['province_id', 'name'];

    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class, 'province_id', 'province_id');
    }

    public function kecamatan()
    {
        return $this->hasMany(Kecamatan::class, 'regency_id', 'regency_id');
    }
}
