<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Desa extends Model
{
    use HasFactory;

    protected $table = 'desa';
    protected $primaryKey = 'village_id';

    protected $fillable = ['district_id', 'name'];

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'district_id', 'district_id');
    }
}
