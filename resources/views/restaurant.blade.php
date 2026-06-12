@extends('layout.header1')
@section('content')

</div></div></section></div>

@section('hide_footer')@endsection

@php
$avgRating = $restaurant->reviews->count() > 0 ? round($restaurant->reviews->avg('rating')) : 0;
@endphp

<style>
.star-rating { display:flex; flex-direction:row-reverse; justify-content:flex-end; }
.star-rating input { display:none; }
.star-rating label { font-size:2rem; color:#ccc; cursor:pointer; padding:0 2px; }
.star-rating input:checked ~ label { color:#f5a623; }
.star-rating label:hover,
.star-rating label:hover ~ label { color:#f5a623; }
</style>

<section class="about_section layout_padding">
<div class="container">

    @if($restaurant->image_path)
    <div class="mb-4">
        <img src="{{ asset('storage/' . $restaurant->image_path) }}" class="img-fluid rounded shadow" style="width:100%; max-height:400px; object-fit:cover;">
    </div>
    @else
    <div class="mb-4">
        <img src="{{ asset('images/r1.jpg') }}" class="img-fluid rounded shadow" style="width:100%; max-height:400px; object-fit:cover;">
    </div>
    @endif

    <div class="p-4 mb-4 rounded shadow bg-white">
        <h2 class="fw-bold mb-3">{{ $restaurant->name }}</h2>
        <div class="row g-2 mb-3">
            <div class="col-md-6">
                <p class="mb-1"><strong><i class="fa fa-cutlery" style="width:18px;"></i> Cuisine:</strong> {{ $restaurant->cuisine_type }}</p>
                <p class="mb-1"><strong><i class="fa fa-map-marker" style="width:18px;"></i> Address:</strong> {{ $restaurant->address }}</p>
                @if($restaurant->location)
                    <p class="mb-1"><strong><i class="fa fa-location-arrow" style="width:18px;"></i> Location:</strong> {{ $restaurant->location }}</p>
                @endif
            </div>
            <div class="col-md-6">
                @if($restaurant->hours)
                    <p class="mb-1"><strong><i class="fa fa-clock-o" style="width:18px;"></i> Hours:</strong> {{ $restaurant->hours }}</p>
                @endif
                @if($restaurant->phone)
                    <p class="mb-1"><strong><i class="fa fa-phone" style="width:18px;"></i> Phone:</strong> {{ $restaurant->phone }}</p>
                @endif
                @if($restaurant->best_for)
                    <p class="mb-1"><strong><i class="fa fa-star" style="width:18px;"></i> Best For:</strong> {{ $restaurant->best_for }}</p>
                @endif
            </div>
        </div>
        <p class="mb-3">{{ $restaurant->description }}</p>
        <div>
            <strong>Overall Rating:</strong>
            @for($i = 1; $i <= 5; $i++)
                <i class="fa fa-star{{ $i <= $avgRating ? '' : '-o' }}" style="color:#f5a623; font-size:1.1rem;"></i>
            @endfor
            <span style="color:#666; font-size:0.9rem;">({{ $restaurant->reviews->count() }} {{ $restaurant->reviews->count() == 1 ? 'review' : 'reviews' }})</span>
        </div>
    </div>

    @if($restaurant->foodImages->count() > 0)
    <div class="p-4 mb-4 rounded shadow bg-white">
        <h5 class="fw-bold mb-3">Food Photos</h5>
        <div class="row g-2">
            @foreach($restaurant->foodImages as $foodImage)
            <div class="col-6 col-md-3">
                <img src="{{ asset('storage/' . $foodImage->image_path) }}" style="width:100%; height:160px; object-fit:cover; border-radius:8px; cursor:pointer;" onclick="openImg('{{ asset('storage/' . $foodImage->image_path) }}')" alt="Food photo">
            </div>
            @endforeach
        </div>
    </div>
    @endif

    <h4 class="text-white mb-3">Reviews</h4>

    @forelse($restaurant->reviews as $review)
    <div class="p-4 mb-3 rounded shadow bg-white">
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
    <div class="p-4 mb-3 rounded bg-white">
        <p class="text-muted mb-0">No reviews yet. Be the first to review!</p>
    </div>
    @endforelse

    @auth
    <div class="p-4 mt-4 rounded shadow bg-white">
        <h4 class="mb-3">Leave a Review</h4>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="/create-review/{{ $restaurant->id }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="fw-bold d-block mb-2">Rating <span class="text-danger">*</span></label>
                <div class="star-rating">
                    <input type="radio" name="rating" id="s5" value="5"><label for="s5"><i class="fa fa-star"></i></label>
                    <input type="radio" name="rating" id="s4" value="4"><label for="s4"><i class="fa fa-star"></i></label>
                    <input type="radio" name="rating" id="s3" value="3"><label for="s3"><i class="fa fa-star"></i></label>
                    <input type="radio" name="rating" id="s2" value="2"><label for="s2"><i class="fa fa-star"></i></label>
                    <input type="radio" name="rating" id="s1" value="1"><label for="s1"><i class="fa fa-star"></i></label>
                </div>
                @error('rating') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
            </div>
            <div class="mb-3">
                <textarea name="comment" class="form-control @error('comment') is-invalid @enderror" rows="4" placeholder="Write your review...">{{ old('comment') }}</textarea>
                @error('comment') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <button type="submit" class="btn btn-primary me-2">Submit Review</button>
            <button type="button" class="btn btn-secondary" onclick="window.history.back()">Back</button>
        </form>
    </div>
    @else
    <div class="p-4 mt-4 rounded bg-white">
        <p class="mb-0"><a href="/login">Login to leave a review</a></p>
    </div>
    @endauth

</div>
</section>

<div id="imgModal" onclick="this.style.display='none'" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.85); z-index:9999; align-items:center; justify-content:center;">
    <img id="imgModalSrc" src="" style="max-width:90%; max-height:90%; border-radius:10px;">
</div>

<script>
function openImg(src) {
    document.getElementById('imgModalSrc').src = src;
    document.getElementById('imgModal').style.display = 'flex';
}
</script>

@endsection