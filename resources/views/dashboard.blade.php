@extends('layout.header1')
@section('content')

</div></div></section></div>

        <section class="about_section layout_padding">

                <div class="container">
                        <div class="col-md-11 col-lg-10 mx-auto">
                                <div class="heading_container heading_center">
                                        <h2 class="text-white">Add a Restaurant</h2>
                                </div>
                        </div>
                </div>

                <br>

                <main class="container-fluid px-4">

                        @auth

                                <div class="row justify-content-center">
                                        <div class="col-lg-10">
                                                <div class="p-4 mb-5 rounded shadow-lg bg-white">

                                                        <form action="/create-restaurant" method="POST" enctype="multipart/form-data">
                                                                @csrf

                                                                <div class="row g-3">

                                                                        <div class="col-md-6">
                                                                                <label class="fw-bold">Restaurant Name</label>
                                                                                <input type="text" name="name" class="form-control mt-1"
                                                                                        placeholder="Restaurant Name">
                                                                        </div>

                                                                        <div class="col-md-6">
                                                                                <label class="fw-bold">Cuisine Type</label>
                                                                                <select name="cuisine_type" class="form-select mt-1">
                                                                                        <option value="">-- Select Cuisine --</option>
                                                                                        <option value="Khmer">Khmer</option>
                                                                                        <option value="Korean">Korean</option>
                                                                                        <option value="Japanese">Japanese</option>
                                                                                        <option value="Chinese">Chinese</option>
                                                                                        <option value="Other">Other</option>
                                                                                </select>
                                                                        </div>

                                                                        <div class="col-md-6">
                                                                                <label class="fw-bold">Address</label>
                                                                                <input type="text" name="address"
                                                                                        class="form-control mt-1" placeholder="Address">
                                                                        </div>

                                                                        <div class="col-md-6">
                                                                                <label class="fw-bold">Location / Area</label>
                                                                                <input type="text" name="location"
                                                                                        class="form-control mt-1"
                                                                                        placeholder="e.g. BKK1, Phnom Penh">
                                                                        </div>

                                                                        <div class="col-md-4">
                                                                                <label class="fw-bold">Opening Hours</label>
                                                                                <input type="text" name="hours"
                                                                                        class="form-control mt-1"
                                                                                        placeholder="e.g. Daily, 11AM – 10PM">
                                                                        </div>

                                                                        <div class="col-md-4">
                                                                                <label class="fw-bold">Phone</label>
                                                                                <input type="text" name="phone"
                                                                                        class="form-control mt-1"
                                                                                        placeholder="e.g. +855 12 345 678">
                                                                        </div>

                                                                        <div class="col-md-4">
                                                                                <label class="fw-bold">Best For</label>
                                                                                <input type="text" name="best_for"
                                                                                        class="form-control mt-1"
                                                                                        placeholder="e.g. Family dining, Fine dining">
                                                                        </div>

                                                                        <div class="col-12">
                                                                                <label class="fw-bold">Description</label>
                                                                                <textarea name="description" rows="4"
                                                                                        class="form-control mt-1"
                                                                                        placeholder="Describe the restaurant..."></textarea>
                                                                        </div>

                                                                        <div class="col-md-6">
                                                                                <label class="fw-bold">Restaurant Cover Image
                                                                                        (optional)</label>
                                                                                <input type="file" name="image"
                                                                                        class="form-control mt-1">
                                                                        </div>

                                                                        <div class="col-md-6">
                                                                                <label class="fw-bold">Food Images (optional, select
                                                                                        multiple)</label>
                                                                                <input type="file" name="food_images[]"
                                                                                        class="form-control mt-1" multiple>
                                                                        </div>

                                                                </div>

                                                                <div class="mt-4">
                                                                        <button type="submit" name="submit"
                                                                                class="btn btn-primary px-4">Add Restaurant</button>
                                                                </div>

                                                        </form>

                                                </div>
                                        </div>
                                </div>

                                <h2 class="text-center text-white mb-4">My Restaurants</h2>

                                <div class="row justify-content-center">
                                        <div class="col-lg-10">
                                                <div class="row">

                                                        @forelse($restaurants as $r)
                                                                <div class="col-md-4 mb-4">
                                                                        <div class="card shadow border-0 h-100"
                                                                                style="overflow:hidden; border-radius:8px; background:transparent;">

                                                                                <div style="height:200px; overflow:hidden; flex-shrink:0;">
                                                                                        @if($r->image_path)
                                                                                                <img src="{{ asset('storage/' . $r->image_path) }}"
                                                                                                        style="width:100%; height:100%; object-fit:cover; object-position:top; display:block; margin:0; padding:0;">
                                                                                        @else
                                                                                                <img src="{{ asset('images/r1.jpg') }}"
                                                                                                        style="width:100%; height:100%; object-fit:cover; object-position:top; display:block; margin:0; padding:0;">
                                                                                        @endif
                                                                                </div>

                                                                                <div class="card-body" style="background:white;">
                                                                                        <h5 class="fw-bold">{{ $r->name }}</h5>
                                                                                        <p class="mb-1"><small><strong>Cuisine:</strong>
                                                                                                        {{ $r->cuisine_type }}</small></p>
                                                                                        <p class="mb-1"><small><strong>Address:</strong>
                                                                                                        {{ $r->address }}</small></p>
                                                                                        @if($r->hours)
                                                                                                <p class="mb-1"><small><strong>Hours:</strong>
                                                                                                                {{ $r->hours }}</small></p>
                                                                                        @endif
                                                                                        @if($r->phone)
                                                                                                <p class="mb-1"><small><strong>Phone:</strong>
                                                                                                                {{ $r->phone }}</small></p>
                                                                                        @endif
                                                                                        <p class="mt-2 mb-3" style="font-size:0.9rem;">
                                                                                                {{ Str::limit($r->description, 80) }}</p>

                                                                                        <div class="d-flex gap-2">
                                                                                                <a href="/edit-restaurant/{{ $r->id }}"
                                                                                                        class="btn btn-warning btn-sm">Edit</a>
                                                                                                <form action="/delete-restaurant/{{ $r->id }}"
                                                                                                        method="POST">
                                                                                                        @csrf
                                                                                                        @method('DELETE')
                                                                                                        <button
                                                                                                                class="btn btn-danger btn-sm">Delete</button>
                                                                                                </form>
                                                                                        </div>
                                                                                </div>

                                                                        </div>
                                                                </div>
                                                        @empty
                                                                <div class="col-12">
                                                                        <p class="text-center text-white">No restaurants yet. Add your first one
                                                                                above!</p>
                                                                </div>
                                                        @endforelse

                                                </div>
                                        </div>
                                </div>

                        @endauth

                </main>

        </section>


@endsection