<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug', 'image'
    ];

    /**
     * places
     * relasi one to many dari table categories ke table places
     * 1 data category bisa memiliki banyak data place
     * @return void
     */
    public function places()
    {
        return $this->hasMany(Place::class);
    }
    
    /**
     * getImageAttribute
     * tujuannya agar saat manggil atribut image, bisa dapat hasil full-path direktorinya
     * @param  mixed $image
     * @return void
     */
    public function getImageAttribute($image)
    {
        return asset('storage/categories/' . $image);
    }
}
