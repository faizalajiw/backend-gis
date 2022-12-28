<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;    
    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'title', 'slug', 'user_id', 'category_id', 'description', 'phone', 'website', 'office_hours', 'address', 'longitude','latitude'
    ];
    
    /**
     * user
     * relasi belongsTo/dua arah
     * agar bisa memanggil data induk yaitu user dari table place
     * @return void
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    /**
     * category
     * relasi belongsTo/dua arah
     * agar bisa memanggil data induk yaitu category dari table place
     * @return void
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    /**
     * images
     * relasi one to many dari table place ke table places image
     * 1 place bisa memiliki banyak data place image
     * @return void
     */
    public function images()
    {
        return $this->hasMany(PlaceImage::class);
    }
}
