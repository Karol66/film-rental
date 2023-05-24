<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = ['id_film','id_transaction'];

    public function films()
    {
        return $this->belongsTo(Film::class, 'id_film');
    }

    public function transactions()
    {
        return $this->belongsTo(Transactions::class, 'id_transaction');
    }
}
