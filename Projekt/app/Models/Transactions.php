<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function addresses()
    {
        return $this->belongsTo(Adresses::class, 'id_adresses');
    }

    public function item()
    {
        return $this->hasMany(Item::class, 'id_transaction');
    }
}
