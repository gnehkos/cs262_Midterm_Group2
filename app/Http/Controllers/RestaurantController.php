<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\FoodImage;

class RestaurantController extends Controller
{
    public function createRestaurant(Request $request)
    {
        $incomingFields = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'address' => 'required',
            'cuisine_type' => 'required',
            'location' => 'nullable',
            'hours' => 'nullable',
            'phone' => 'nullable',
            'best_for' => 'nullable',
            'image' => 'nullable|image|max:2048',
            'food_images.*' => 'nullable|image|max:2048'
        ]);

        $incomingFields['name'] = strip_tags($incomingFields['name']);
        $incomingFields['description'] = strip_tags($incomingFields['description']);
        $incomingFields['address'] = strip_tags($incomingFields['address']);
        $incomingFields['cuisine_type'] = strip_tags($incomingFields['cuisine_type']);
        $incomingFields['location'] = strip_tags($incomingFields['location'] ?? '');
        $incomingFields['hours'] = strip_tags($incomingFields['hours'] ?? '');
        $incomingFields['phone'] = strip_tags($incomingFields['phone'] ?? '');
        $incomingFields['best_for'] = strip_tags($incomingFields['best_for'] ?? '');
        $incomingFields['user_id'] = auth()->id();

        if ($request->hasFile('image')) {
            $incomingFields['image_path'] = $request->file('image')->store('restaurants', 'public');
        }

        unset($incomingFields['image']);
        unset($incomingFields['food_images']);
        $restaurant = Restaurant::create($incomingFields);

        if ($request->hasFile('food_images')) {
            foreach ($request->file('food_images') as $file) {
                $path = $file->store('restaurants/food', 'public');
                FoodImage::create([
                    'restaurant_id' => $restaurant->id,
                    'image_path' => $path
                ]);
            }
        }

        return redirect('/dashboard');
    }

    public function showRestaurant(Restaurant $restaurant)
    {
        $restaurant->load(['reviews.user', 'foodImages']); // 

        return view('restaurant', ['restaurant' => $restaurant]);
    }

    public function showEditScreen(Restaurant $restaurant)
    {
        if (auth()->user()->id != $restaurant['user_id']) {
            return redirect('/dashboard');
        }
        return view('edit-restaurant', ['restaurant' => $restaurant]);
    }

    public function updateRestaurant(Restaurant $restaurant, Request $request)
    {
        if (auth()->user()->id != $restaurant['user_id']) {
            return redirect('/dashboard');
        }

        $incomingFields = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'address' => 'required',
            'cuisine_type' => 'required',
            'location' => 'nullable',
            'hours' => 'nullable',
            'phone' => 'nullable',
            'best_for' => 'nullable',
            'image' => 'nullable|image|max:2048',
            'food_images.*' => 'nullable|image|max:2048'
        ]);

        $incomingFields['name'] = strip_tags($incomingFields['name']);
        $incomingFields['description'] = strip_tags($incomingFields['description']);
        $incomingFields['address'] = strip_tags($incomingFields['address']);
        $incomingFields['cuisine_type'] = strip_tags($incomingFields['cuisine_type']);
        $incomingFields['location'] = strip_tags($incomingFields['location'] ?? '');
        $incomingFields['hours'] = strip_tags($incomingFields['hours'] ?? '');
        $incomingFields['phone'] = strip_tags($incomingFields['phone'] ?? '');
        $incomingFields['best_for'] = strip_tags($incomingFields['best_for'] ?? '');

        if ($request->hasFile('image')) {
            if ($restaurant->image_path) {
                \Storage::disk('public')->delete($restaurant->image_path);
            }
            $incomingFields['image_path'] = $request->file('image')->store('restaurants', 'public');
        }

        unset($incomingFields['image']);
        unset($incomingFields['food_images']);
        $restaurant->update($incomingFields);

        if ($request->hasFile('food_images')) {
            foreach ($request->file('food_images') as $file) {
                $path = $file->store('restaurants/food', 'public');
                FoodImage::create([
                    'restaurant_id' => $restaurant->id,
                    'image_path' => $path
                ]);
            }
        }

        return redirect('/dashboard');
    }

    public function deleteRestaurant(Restaurant $restaurant)
    {
        if (auth()->user()->id == $restaurant->user_id) {
            foreach ($restaurant->foodImages as $foodImage) {
                \Storage::disk('public')->delete($foodImage->image_path);
            }
            $restaurant->foodImages()->delete();
            $restaurant->reviews()->delete();
            if ($restaurant->image_path) {
                \Storage::disk('public')->delete($restaurant->image_path);
            }
            $restaurant->delete();
        }
        return redirect('/dashboard');
    }
}