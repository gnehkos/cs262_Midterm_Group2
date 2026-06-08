<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;

class RestaurantController extends Controller
{
    public function createRestaurant(Request $request){
    $incomingFields = $request->validate([
        'name' => 'required',
        'description' => 'required',
        'address' => 'required',
        'cuisine_type' => 'required',
        'image' => 'nullable|image|max:2048'
    ]);

    $incomingFields['name'] = strip_tags($incomingFields['name']);
    $incomingFields['description'] = strip_tags($incomingFields['description']);
    $incomingFields['address'] = strip_tags($incomingFields['address']);
    $incomingFields['cuisine_type'] = strip_tags($incomingFields['cuisine_type']);
    $incomingFields['user_id'] = auth()->id();

    if($request->hasFile('image')){
        $incomingFields['image_path'] = $request->file('image')->store('restaurants', 'public');
    }

    unset($incomingFields['image']);
    Restaurant::create($incomingFields);
    return redirect('/dashboard');
}


    public function showRestaurant(Restaurant $restaurant){
        return view('restaurant', ['restaurant' => $restaurant]);
    }

    public function showEditScreen(Restaurant $restaurant){
        if(auth()->user()->id != $restaurant['user_id']){
            return redirect('/dashboard');
        }

        return view('edit-restaurant', ['restaurant' => $restaurant]);
    }

    public function updateRestaurant(Restaurant $restaurant, Request $request){
    if(auth()->user()->id != $restaurant['user_id']){
        return redirect('/dashboard');
    }

    $incomingFields = $request->validate([
        'name' => 'required',
        'description' => 'required',
        'address' => 'required',
        'cuisine_type' => 'required',
        'image' => 'nullable|image|max:2048'
    ]);

    $incomingFields['name'] = strip_tags($incomingFields['name']);
    $incomingFields['description'] = strip_tags($incomingFields['description']);
    $incomingFields['address'] = strip_tags($incomingFields['address']);
    $incomingFields['cuisine_type'] = strip_tags($incomingFields['cuisine_type']);

    if($request->hasFile('image')){
        if($restaurant->image_path){
            \Storage::disk('public')->delete($restaurant->image_path);
        }
        $incomingFields['image_path'] = $request->file('image')->store('restaurants', 'public');
    }

    unset($incomingFields['image']);
    $restaurant->update($incomingFields);
    return redirect('/dashboard');
}

    public function deleteRestaurant(Restaurant $restaurant){
        if(auth()->user()->id == $restaurant->user_id){
            $restaurant->reviews()->delete();
            $restaurant->delete();
        }
        return redirect('/dashboard');
    }

    public function allRestaurant()
{
    $restaurants = Restaurant::where('user_id', auth()->id())->latest()->get();

    return view('AllRestaurant', compact('restaurants'));
}
}
