<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name',
        'city',
    ];

    public function images()
    {
        return $this->hasMany(UserImage::class);
    }
    
    public function images_count()
    {
        return $this->hasMany(UserImage::class)->withCount('images');
    }
}
