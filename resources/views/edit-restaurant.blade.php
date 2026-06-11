@extends('layout.header1')
@section('content')

</div></div></section></div>

<section class="about_section layout_padding">
<div class="container">

    <div class="heading_container heading_center mb-4">
        <h2 class="text-white">Edit Restaurant</h2>
    </div>

    @auth
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="p-5 rounded shadow-lg bg-white">
                <form action="/edit-restaurant/{{ $restaurant->id }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <p class="fw-bold">Restaurant Name</p>
                    <input type="text" name="name" value="{{ $restaurant->name }}" class="form-control my-2" placeholder="Restaurant Name">
                    <p class="fw-bold">Address</p>
                    <input type="text" name="address" value="{{ $restaurant->address }}" class="form-control my-2" placeholder="Address">
                    <p class="fw-bold">Cuisine Type</p>
                    <select name="cuisine_type" class="form-control my-2">
                        <option value="Khmer" {{ $restaurant->cuisine_type == 'Khmer' ? 'selected' : '' }}>Khmer</option>
                        <option value="Korean" {{ $restaurant->cuisine_type == 'Korean' ? 'selected' : '' }}>Korean</option>
                        <option value="Japanese" {{ $restaurant->cuisine_type == 'Japanese' ? 'selected' : '' }}>Japanese</option>
                        <option value="Chinese" {{ $restaurant->cuisine_type == 'Chinese' ? 'selected' : '' }}>Chinese</option>
                        <option value="Other" {{ $restaurant->cuisine_type == 'Other' ? 'selected' : '' }}>Other</option>
                    </select>
                    <p class="fw-bold">Description</p>
                    <textarea name="description" class="form-control my-2" rows="5">{{ $restaurant->description }}</textarea>
                    @if($restaurant->image_path)
                    <div class="my-3">
                        <p class="fw-bold">Current Image:</p>
                        <img src="{{ asset('storage/' . $restaurant->image_path) }}" style="max-width:200px; border-radius:8px;">
                    </div>
                    @endif
                    <div class="my-3">
                        <p class="fw-bold">Upload New Image (optional):</p>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <button class="btn btn-primary btn-lg px-4">Save Changes</button>
                    <a href="/dashboard" class="btn btn-secondary btn-lg px-4 ms-2">Cancel</a>
                </form>
            </div>
        </div>
    </div>
    @endauth

</div>
</section>

<footer class="footer_section">
    <div class="container">
        <p>&copy; <span id="displayYear"></span> All Rights Reserved By Delfood Team</p>
    </div>
</footer>

@endsection