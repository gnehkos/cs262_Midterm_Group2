<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $fillable = ['name', 'description', 'address', 'cuisine_type', 'image_path', 'user_id'];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function reviews(){
        return $this->hasMany(Review::class, 'restaurant_id');
    }
}
