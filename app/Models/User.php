<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     * 
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    /**
     * sliders
     * relasi one to many dari table users ke table sliders
     * 1 user bisa memiliki banyak data slider
     * @return void
     */
    public function sliders()
    {
        return $this->hasMany(Slider::class);
    }
    
    /**
     * categories
     * relasi one to many dari table users ke table categories
     * 1 user bisa memiliki banyak data category
     * @return void
     */
    public function categories()
    {
        return $this->hasMany(Category::class);
    }
    
    /**
     * places
     * relasi one to many dari table users ke table places
     * 1 user bisa memiliki banyak data place
     * @return void
     */
    public function places()
    {
        return $this->hasMany(Place::class);
    }
}
