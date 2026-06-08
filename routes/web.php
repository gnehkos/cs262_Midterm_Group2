<?php

use Illuminate\Support\Facades\Route;
use App\Models\Restaurant;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\ReviewController;

Route::get('/', function () { return view('Home', ['restaurants' => Restaurant::latest()->take(6)->get()]); });
Route::get('/home', function () { return view('Home', ['restaurants' => Restaurant::latest()->take(6)->get()]); });
Route::get('/menu', function () { return view('Menu', ['restaurants' => Restaurant::latest()->get()]); });
Route::get('/khmer', function () { return view('Khmer', ['restaurants' => Restaurant::where('cuisine_type', 'Khmer')->get()]); });
Route::get('/korean', function () { return view('Korean', ['restaurants' => Restaurant::where('cuisine_type', 'Korean')->get()]); });
Route::get('/japanese', function () { return view('Japanese', ['restaurants' => Restaurant::where('cuisine_type', 'Japanese')->get()]); });
Route::get('/chinese', function () { return view('Chinese', ['restaurants' => Restaurant::where('cuisine_type', 'Chinese')->get()]); });
Route::get('/contact', function () { return view('contact'); });
Route::get('/login', function () { return view('login'); })->name('login');
Route::get('/signup', function () { return view('signup'); });
Route::get('/kravanh', function () { return view('kravanh'); });
Route::get('/pbp', function () { return view('pbp'); });
Route::get('/allrestaurant', [RestaurantController::class, 'allRestaurant']);
Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout']);

Route::get('/dashboard', function () {
    if(!auth()->check()){
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