<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'image',
        'name',
        'type',
        'time',
        'relese_date',
        'country',
        'price'
    ];

    use HasFactory;
}
