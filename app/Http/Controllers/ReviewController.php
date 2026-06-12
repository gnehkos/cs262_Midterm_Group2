<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Restaurant;

class ReviewController extends Controller
{
    public function createReview(Request $request, Restaurant $restaurant)
    {
        $incomingFields = $request->validate([
            'rating' => ['required', 'integer', 'min:1', 'max:5'],
            'comment' => 'nullable|string|max:1000',
        ]);

        $incomingFields['comment'] = strip_tags($incomingFields['comment']);
        $incomingFields['user_id'] = auth()->id();
        $incomingFields['restaurant_id'] = $restaurant->id;

        Review::create($incomingFields);

        return redirect()->back()->with('success', 'Review submitted successfully!');
    }

    public function deleteReview(Review $review)
    {
        if (auth()->user()->id == $review['user_id']) {
            $review->delete();
        }

        return redirect()->back();
    }
}