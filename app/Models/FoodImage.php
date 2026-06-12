<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FoodImage extends Model
{
    protected $table = 'restaurant_food_images';

    protected $fillable = ['restaurant_id', 'image_path'];

    public function restaurant(){
        return $this->belongsTo(Restaurant::class, 'restaurant_id');
    }
}