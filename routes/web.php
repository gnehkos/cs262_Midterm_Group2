<?php

use Illuminate\Support\Facades\Route;
use App\Models\Restaurant;
use App\Models\FoodImage;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\FoodImageController;

Route::get('/', function () {
    return view('Home', [
        'restaurants' => Restaurant::with(['reviews', 'foodImages'])->latest()->take(6)->get(),
        'foodImages' => FoodImage::with('restaurant')->inRandomOrder()->take(10)->get()
    ]);
});
Route::get('/home', function () {
    return view('Home', [
        'restaurants' => Restaurant::with(['reviews', 'foodImages'])->latest()->take(6)->get(),
        'foodImages' => FoodImage::with('restaurant')->inRandomOrder()->take(10)->get()
    ]);
});
Route::get('/khmer', function () {
    return view('Khmer', [
        'restaurants' => Restaurant::with(['reviews', 'foodImages'])->where('cuisine_type', 'Khmer')->get(),
        'foodImages' => FoodImage::whereHas('restaurant', fn($q) => $q->where('cuisine_type', 'Khmer'))->with('restaurant')->inRandomOrder()->take(10)->get()
    ]);
});
Route::get('/korean', function () {
    return view('Korean', [
        'restaurants' => Restaurant::with(['reviews', 'foodImages'])->where('cuisine_type', 'Korean')->get(),
        'foodImages' => FoodImage::whereHas('restaurant', fn($q) => $q->where('cuisine_type', 'Korean'))->with('restaurant')->inRandomOrder()->take(10)->get()
    ]);
});
Route::get('/japanese', function () {
    return view('Japanese', [
        'restaurants' => Restaurant::with(['reviews', 'foodImages'])->where('cuisine_type', 'Japanese')->get(),
        'foodImages' => FoodImage::whereHas('restaurant', fn($q) => $q->where('cuisine_type', 'Japanese'))->with('restaurant')->inRandomOrder()->take(10)->get()
    ]);
});
Route::get('/chinese', function () {
    return view('Chinese', [
        'restaurants' => Restaurant::with(['reviews', 'foodImages'])->where('cuisine_type', 'Chinese')->get(),
        'foodImages' => FoodImage::whereHas('restaurant', fn($q) => $q->where('cuisine_type', 'Chinese'))->with('restaurant')->inRandomOrder()->take(10)->get()
    ]);
});
Route::get('/other', function () {
    return view('Other', [
        'restaurants' => Restaurant::with(['reviews', 'foodImages'])->where('cuisine_type', 'Other')->get(),
        'foodImages' => FoodImage::whereHas('restaurant', fn($q) => $q->where('cuisine_type', 'Other'))->with('restaurant')->inRandomOrder()->take(10)->get()
    ]);
});
Route::get('/allrestaurant', function () {
    return view('allrestaurant', ['restaurants' => Restaurant::with('reviews')->latest()->get()]);
});
Route::get('/contact', function () {
    return view('contact'); });
Route::get('/login', function () {
    return view('login'); })->name('login');
Route::get('/signup', function () {
    return view('signup'); });

Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout']);

Route::get('/dashboard', function () {
    if (!auth()->check()) {
        return redirect('/login');
    }
    $restaurants = auth()->user()->usersRestaurants()->latest()->get();
    return view('dashboard', ['restaurants' => $restaurants]);
});

Route::post('/create-restaurant', [RestaurantController::class, 'createRestaurant']);
Route::get('/restaurant/{restaurant}', [RestaurantController::class, 'showRestaurant']);
Route::get('/edit-restaurant/{restaurant}', [RestaurantController::class, 'showEditScreen']);
Route::put('/edit-restaurant/{restaurant}', [RestaurantController::class, 'updateRestaurant']);
Route::delete('/delete-restaurant/{restaurant}', [RestaurantController::class, 'deleteRestaurant']);
Route::post('/create-review/{restaurant}', [ReviewController::class, 'createReview']);
Route::delete('/delete-review/{review}', [ReviewController::class, 'deleteReview']);
Route::delete('/delete-food-image/{foodImage}', [FoodImageController::class, 'deleteFoodImage']);