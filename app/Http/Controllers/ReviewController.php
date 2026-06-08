<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Restaurant;

class ReviewController extends Controller
{
    public function createReview(Request $request, Restaurant $restaurant){
        $incomingFields = $request->validate([
            'comment' => 'required',
            'rating' => ['required', 'integer', 'min:1', 'max:5']
        ]);

        $incomingFields['comment'] = strip_tags($incomingFields['comment']);
        $incomingFields['user_id'] = auth()->id();
        $incomingFields['restaurant_id'] = $restaurant->id;

        Review::create($incomingFields);

        return redirect()->back();
    }

    public function deleteReview(Review $review){
        if(auth()->user()->id == $review['user_id']){
            $review->delete();
        }

        return redirect()->back();
    }
}
