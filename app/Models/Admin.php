<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
// use Illuminate\Contracts\Auth\Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'full_name',
        'email',
        'password',
        'profile_photo',
    ];

    protected $hidden = [
        'password',
    ];

    public function court() {
        return $this->hasMany(Court::class);
    }
}
