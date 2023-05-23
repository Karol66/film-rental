<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    public function films()
    {
        return $this->belongsTo(Film::class);
    }

    public function transactions()
    {
        return $this->belongsTo(Adresses::class);
    }
}
