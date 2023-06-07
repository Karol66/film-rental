<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adresses extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'street',
        'home_number',
        'apartment_number',
        'city',
        'id_user'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function transactions()
    {
        return $this->hasMany(Transactions::class, 'id_adresses');
    }
}
