<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Film extends Model
{
    use HasFactory;
    use SoftDeletes;


    public $timestamps = false;

    protected $fillable = [
        'image',
        'name',
        'type',
        'film_length',
        'release_date',
        'country',
        'price'
    ];

    public function item()
    {
        return $this->hasMany(Item::class, 'id_transaction');
    }
}
