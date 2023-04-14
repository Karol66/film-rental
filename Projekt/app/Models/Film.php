<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    public $timestamps = false;


    protected $table = 'film';
    protected $primaryKey = 'id';
    protected $fillable = ['image','name','type','time','releseDate','country','price','number'];

    use HasFactory;
}
