@extends('layout.header1')
@section('content')

</div></div></section></div>

@php
$avgRating = $restaurant->reviews->count() > 0 ? round($restaurant->reviews->avg('rating')) : 0;
@endphp

<section class="about_section layout_padding">
<div class="container">

    @if($restaurant->image_path)
    <div class="mb-4">
        <img src="{{ asset('storage/' . $restaurant->image_path) }}" class="img-fluid rounded shadow" style="width:100%; max-height:400px; object-fit:cover;">
    </div>
    @endif

    <div class="p-4 mb-4 rounded shadow" style="background:white;">
        <h2>{{ $restaurant->name }}</h2>
        <p><strong>Cuisine:</strong> {{ $restaurant->cuisine_type }}</p>
        <p><strong>Address:</strong> {{ $restaurant->address }}</p>
        <p>{{ $restaurant->description }}</p>
        <div>
            <strong>Overall Rating:</strong>
            @for($i = 1; $i <= 5; $i++)
                <i class="fa fa-star{{ $i <= $avgRating ? '' : '-o' }}" style="color:#f5a623; font-size:1.1rem;"></i>
            @endfor
            <span style="color:#666; font-size:0.9rem;">
                ({{ $restaurant->reviews->count() }} {{ $restaurant->reviews->count() == 1 ? 'review' : 'reviews' }})
            </span>
        </div>
    </div>

    <h3 class="text-white mb-4">Reviews</h3>

    @forelse($restaurant->reviews as $review)
    <div class="p-4 mb-3 rounded shadow" style="background:white;">
        <h5 class="fw-bold mb-1">{{ $review->user->name }}</h5>
        <div class="mb-2">
            @for($i = 1; $i <= 5; $i++)
                <i class="fa fa-star{{ $i <= $review->rating ? '' : '-o' }}" style="color:#f5a623;"></i>
            @endfor
        </div>
        <p class="mb-2">{{ $review->comment }}</p>
        @auth
            @if(auth()->id() == $review->user_id)
            <form action="/delete-review/{{ $review->id }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm">Delete</button>
            </form>
            @endif
        @endauth
    </div>
    @empty
    <div class="p-4 mb-3 rounded" style="background:white;">
        <p class="text-muted mb-0">No reviews yet. Be the first to review!</p>
    </div>
    @endforelse

    @auth
    <div class="p-4 mt-4 rounded shadow" style="background:white;">
        <h4 class="mb-3">Leave a Review</h4>
        <form action="/create-review/{{ $restaurant->id }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="fw-bold d-block mb-1">Rating</label>
                <input type="hidden" name="rating" id="rating-value" value="0">
                <div id="star-container" style="font-size:2rem; cursor:pointer; color:#f5a623; display:inline-block;">
                    <i class="fa fa-star-o star-btn" data-value="1"></i>
                    <i class="fa fa-star-o star-btn" data-value="2"></i>
                    <i class="fa fa-star-o star-btn" data-value="3"></i>
                    <i class="fa fa-star-o star-btn" data-value="4"></i>
                    <i class="fa fa-star-o star-btn" data-value="5"></i>
                </div>
            </div>
            <div class="mb-3">
                <textarea name="comment" class="form-control" rows="4" placeholder="Write your review..."></textarea>
            </div>
            <button type="submit" class="btn btn-primary me-2">Submit Review</button>
            <button type="button" class="btn btn-secondary" onclick="window.history.back()">Back</button>
        </form>
    </div>
    @else
    <div class="p-4 mt-4 rounded" style="background:white;">
        <p class="mb-0"><a href="/login">Login to leave a review</a></p>
    </div>
    @endauth

</div>
</section>

<footer class="footer_section">
    <div class="container">
        <p>&copy; <span id="displayYear"></span> All Rights Reserved By Delfood Team</p>
    </div>
</footer>

<script>
var starBtns = document.querySelectorAll('.star-btn');
var container = document.getElementById('star-container');
starBtns.forEach(function(star) {
    star.addEventListener('click', function() {
        var val = parseInt(this.getAttribute('data-value'));
        document.getElementById('rating-value').value = val;
        starBtns.forEach(function(s) {
            s.className = parseInt(s.getAttribute('data-value')) <= val ? 'fa fa-star star-btn' : 'fa fa-star-o star-btn';
        });
    });
    star.addEventListener('mouseover', function() {
        var val = parseInt(this.getAttribute('data-value'));
        starBtns.forEach(function(s) {
            s.className = parseInt(s.getAttribute('data-value')) <= val ? 'fa fa-star star-btn' : 'fa fa-star-o star-btn';
        });
    });
});
container.addEventListener('mouseleave', function() {
    var selected = parseInt(document.getElementById('rating-value').value);
    starBtns.forEach(function(s) {
        s.className = parseInt(s.getAttribute('data-value')) <= selected ? 'fa fa-star star-btn' : 'fa fa-star-o star-btn';
    });
});
</script>

@endsection