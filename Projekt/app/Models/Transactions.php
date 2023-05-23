<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function adresses()
    {
        return $this->belongsTo(Adresses::class);
    }

    public function item()
    {
        return $this->hasMany(Item::class);
    }
}
