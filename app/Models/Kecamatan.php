<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;

    protected $table = 'kecamatan';
    protected $primaryKey = 'district_id';

    protected $fillable = ['regency_id', 'name'];

    public function kabupaten()
    {
        return $this->belongsTo(Kabupaten::class, 'regency_id', 'regency_id');
    }

    public function desa()
    {
        return $this->hasMany(Desa::class, 'district_id', 'district_id');
    }
}
