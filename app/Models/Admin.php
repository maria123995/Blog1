<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;


class Admin extends Authenticatable
// class Admin extends Model
{

    use HasApiTokens, HasFactory, Notifiable;


    protected $guard ="admin";
    
    protected $table = 'admins';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];


    // public function users()
    // {
    //     return $this->hasMany(User::class);
    // }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

}
