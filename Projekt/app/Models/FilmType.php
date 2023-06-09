<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilmType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function film()
    {
        return $this->hasMany(Film::class, 'id_film_type');
    }
}
