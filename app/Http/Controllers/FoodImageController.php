<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FoodImage;

class FoodImageController extends Controller
{
    public function deleteFoodImage(FoodImage $foodImage){
        if(auth()->user()->id == $foodImage->restaurant->user_id){
            \Storage::disk('public')->delete($foodImage->image_path);
            $foodImage->delete();
        }
        return redirect()->back();
    }
}