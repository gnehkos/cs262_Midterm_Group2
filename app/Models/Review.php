<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['comment', 'rating', 'user_id', 'restaurant_id'];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function restaurant(){
        return $this->belongsTo(Restaurant::class, 'restaurant_id');
    }
}
