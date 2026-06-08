@extends('layout.header1')

@section('content')
    <div class="container my-4">
        @auth
            <h2>Edit Restaurant</h2>
            <form action="/edit-restaurant/{{ $restaurant->id }}" method="POST" class="p-3" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="text" name="name" value="{{ $restaurant->name }}" class="form-control my-2" placeholder="Restaurant Name">
                <input type="text" name="address" value="{{ $restaurant->address }}" class="form-control my-2" placeholder="Address">
                <select name="cuisine_type" class="form-control my-2">
                    <option value="Khmer" {{ $restaurant->cuisine_type == 'Khmer' ? 'selected' : '' }}>Khmer</option>
                    <option value="Korean" {{ $restaurant->cuisine_type == 'Korean' ? 'selected' : '' }}>Korean</option>
                    <option value="Japanese" {{ $restaurant->cuisine_type == 'Japanese' ? 'selected' : '' }}>Japanese</option>
                    <option value="Chinese" {{ $restaurant->cuisine_type == 'Chinese' ? 'selected' : '' }}>Chinese</option>
                    <option value="Other" {{ $restaurant->cuisine_type == 'Other' ? 'selected' : '' }}>Other</option>
                </select>
                <textarea name="description" class="form-control my-2">{{ $restaurant->description }}</textarea>

                @if($restaurant->image_path)
                    <div class="my-2">
                        <p>Current Image:</p>
                        <img src="{{ asset('storage/' . $restaurant->image_path) }}" style="max-width:200px;">
                    </div>
                @endif
                <div class="my-2">
                    <label>Upload New Image (optional):</label>
                    <input type="file" name="image" class="form-control">
                </div>

                <button class="btn btn-primary">Save Changes</button>
            </form>
        @endauth
    </div>
@endsection