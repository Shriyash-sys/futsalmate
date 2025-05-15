<?php

namespace App\Models;

use App\Models\Court;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'date',
        'time',
        'court',
        'payment',
        'price',
        'user_id',
        'court_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function court()
    {
        return $this->belongsTo(Court::class);
    }
}
