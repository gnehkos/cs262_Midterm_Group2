@extends('layout.header1')
@section('content')

    </div>
    </div>
    </section>
    </div>

    <section class="about_section layout_padding">
        <div class="container">

            <div class="heading_container heading_center mb-4">
                <h2 class="text-white">Edit Restaurant</h2>
            </div>

            @auth
                <div class="row justify-content-center">
                    <div class="col-lg-8">

                        {{-- FOOD IMAGE REMOVE FORMS - outside main form --}}
                        @if($restaurant->foodImages->count() > 0)
                        <div class="p-4 mb-3 rounded shadow-lg bg-white">
                            <label class="fw-bold">Current Food Images</label>
                            <div class="row g-2 mt-2">
                                @foreach($restaurant->foodImages as $foodImage)
                                <div class="col-4 col-md-3 text-center">
                                    <img src="{{ asset('storage/' . $foodImage->image_path) }}"
                                        style="width:100%; height:100px; object-fit:cover; border-radius:6px;">
                                    <form action="/delete-food-image/{{ $foodImage->id }}" method="POST" class="mt-1">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm"
                                            style="font-size:0.75rem; padding:2px 8px;">Remove</button>
                                    </form>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endif

                        {{-- MAIN EDIT FORM --}}
                        <div class="p-4 rounded shadow-lg bg-white">
                            <form action="/edit-restaurant/{{ $restaurant->id }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="row g-3">

                                    <div class="col-md-6">
                                        <label class="fw-bold">Restaurant Name</label>
                                        <input type="text" name="name" value="{{ $restaurant->name }}"
                                            class="form-control mt-1">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="fw-bold">Cuisine Type</label>
                                        <select name="cuisine_type" class="form-select mt-1">
                                            <option value="Khmer" {{ $restaurant->cuisine_type == 'Khmer' ? 'selected' : '' }}>Khmer</option>
                                            <option value="Korean" {{ $restaurant->cuisine_type == 'Korean' ? 'selected' : '' }}>Korean</option>
                                            <option value="Japanese" {{ $restaurant->cuisine_type == 'Japanese' ? 'selected' : '' }}>Japanese</option>
                                            <option value="Chinese" {{ $restaurant->cuisine_type == 'Chinese' ? 'selected' : '' }}>Chinese</option>
                                            <option value="Other" {{ $restaurant->cuisine_type == 'Other' ? 'selected' : '' }}>Other</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="fw-bold">Address</label>
                                        <input type="text" name="address" value="{{ $restaurant->address }}"
                                            class="form-control mt-1">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="fw-bold">Location / Area</label>
                                        <input type="text" name="location" value="{{ $restaurant->location }}"
                                            class="form-control mt-1" placeholder="e.g. BKK1, Phnom Penh">
                                    </div>

                                    <div class="col-md-4">
                                        <label class="fw-bold">Opening Hours</label>
                                        <input type="text" name="hours" value="{{ $restaurant->hours }}"
                                            class="form-control mt-1" placeholder="e.g. Daily, 11AM – 10PM">
                                    </div>

                                    <div class="col-md-4">
                                        <label class="fw-bold">Phone</label>
                                        <input type="text" name="phone" value="{{ $restaurant->phone }}"
                                            class="form-control mt-1" placeholder="e.g. +855 12 345 678">
                                    </div>

                                    <div class="col-md-4">
                                        <label class="fw-bold">Best For</label>
                                        <input type="text" name="best_for" value="{{ $restaurant->best_for }}"
                                            class="form-control mt-1" placeholder="e.g. Family dining">
                                    </div>

                                    <div class="col-12">
                                        <label class="fw-bold">Description</label>
                                        <textarea name="description" class="form-control mt-1"
                                            rows="4">{{ $restaurant->description }}</textarea>
                                    </div>

                                    <div class="col-12">
                                        <label class="fw-bold">Cover Image</label>
                                        @if($restaurant->image_path)
                                            <div class="my-2">
                                                <img src="{{ asset('storage/' . $restaurant->image_path) }}"
                                                    style="max-width:160px; border-radius:8px;">
                                            </div>
                                        @endif
                                        <input type="file" name="image" class="form-control mt-1">
                                    </div>

                                    <div class="col-12">
                                        <label class="fw-bold">Add More Food Images (optional)</label>
                                        <input type="file" name="food_images[]" class="form-control mt-1" multiple>
                                        <small class="text-muted">Select multiple to add more food photos</small>
                                    </div>

                                </div>

                                <div class="mt-4 d-flex gap-2">
                                    <button class="btn btn-primary px-4">Save Changes</button>
                                    <a href="/dashboard" class="btn btn-secondary px-4">Cancel</a>
                                </div>

                            </form>
                        </div>

                    </div>
                </div>
            @endauth

        </div>
    </section>

@endsection