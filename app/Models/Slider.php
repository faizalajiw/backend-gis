<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;    
    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'image'
    ];
    
    /**
     * getImageAttribute
     * tujuannya agar saat manggil atribut image, agar dapat hasil full-path direktorinya
     * @param  mixed $image
     * @return void
     */
    public function getImageAttribute($image)
    {
        return asset('storage/sliders/' . $image);
    }
}
