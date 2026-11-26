<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Despar extends Model
{
    use HasFactory;

    protected $table = 'despar';
    protected $primaryKey = 'destination_id';

    protected $fillable = [
        'name',
        'description',
        'image',
        'village_id',
        'price',
    ];

    public function desa()
    {
        return $this->belongsTo(Desa::class, 'village_id', 'village_id');
    }
}
