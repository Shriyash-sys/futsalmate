<?php

namespace App\Models;

use App\Models\Book;
use Illuminate\Database\Eloquent\Model;

class Court extends Model
{
    protected $fillable = [
        'court_name',
        'location',
        'price',
        'image_path',
        'image_url' ,
        'description',
        'admin_id',
    ];

    // public function bookings()
    // {
    //     return $this->hasMany(Book::class, 'court');
    // }

    public function admin() {
        return $this->hasMany(Admin::class);
    }

    public function bookings()
    {
        return $this->hasMany(Book::class);
    }
}
