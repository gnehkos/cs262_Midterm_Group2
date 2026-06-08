@extends('layout.header1')

@section('content')
    <main class="container">
        <div class="row">

            {{-- ==================== Restaurant Details ==================== --}}
            <div class="p-4 p-md-5 mb-4 rounded text-body-emphasis bg-body-secondary">
                <h2>{{$restaurant->name}}</h2>
                <p><strong>Cuisine:</strong> {{$restaurant->cuisine_type}}</p>
                <p><strong>Address:</strong> {{$restaurant->address}}</p>
                <p>{{$restaurant->description}}</p>
            </div>

            {{-- ==================== Reviews ==================== --}}
            <h2>Reviews</h2>

            @forelse($restaurant->reviews as $review)
                <div class="p-4 p-md-5 mb-4 rounded text-body-emphasis bg-body-secondary">
                    <h5>{{$review->user->name}}</h5>
                    <p><strong>Rating: {{$review->rating}}/5</strong></p>
                    <p>{{$review->comment}}</p>

                    @auth
                        @if(auth()->id() == $review->user_id)
                            <form action="/delete-review/{{$review->id}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        @endif
                    @endauth
                </div>
            @empty
                <p>No reviews yet.</p>
            @endforelse

            {{-- ==================== Leave a Review ==================== --}}
            @auth
                <h2>Leave a Review</h2>
                <div class="p-4 p-md-5 mb-4 rounded text-body-emphasis bg-body-secondary">
                    <form action="/create-review/{{$restaurant->id}}" method="POST">
                        @csrf
                        <textarea name="comment" class="form-control my-2" placeholder="Write your review..."></textarea>
                        <input type="number" name="rating" class="form-control my-2" placeholder="Rating" min="1" max="5">
                        <br>
                        <button type="submit" name="submit" class="btn btn-primary my-2">Submit Review</button>
                    </form>
                </div>
            @else
                <p><a href="/signup">Login to leave a review</a></p>
            @endauth

        </div>
    </main>
@endsection
