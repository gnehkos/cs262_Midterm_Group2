@extends('layout.header1')
@section('content')
    <div class="container my-4">
        <div class="row">
            @auth
                <h2>Add a Restaurant</h2>
                <div class="p-4 p-md-5 mb-4 rounded text-body-emphasis bg-body-secondary">
                    <form action="/create-restaurant" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="name" class="my-2" placeholder="Restaurant Name">
                        <input type="text" name="address" class="my-2" placeholder="Address">
                        <select name="cuisine_type" class="my-2">
                            <option value="">-- Select Cuisine --</option>
                            <option value="Khmer">Khmer</option>
                            <option value="Korean">Korean</option>
                            <option value="Japanese">Japanese</option>
                            <option value="Chinese">Chinese</option>
                            <option value="Other">Other</option>
                        </select>
                        <br>
                        <textarea name="description" class="my-2" placeholder="Description..."></textarea>
                        <br>
                        <div class="my-2">
                            <label>Restaurant Image (optional):</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary my-2">Add Restaurant</button>
                    </form>
                </div>

                <h2>My Restaurants</h2>
                @foreach($restaurants as $r)
                    <div class="p-4 p-md-5 mb-4 rounded text-body-emphasis bg-body-secondary">
                        @if($r->image_path)
                            <img src="{{ asset('storage/' . $r->image_path) }}" style="max-width:200px;" class="mb-2">
                        @endif
                        <h3>{{ $r['name'] }}</h3>
                        <p><strong>Cuisine:</strong> {{ $r['cuisine_type'] }}</p>
                        <p><strong>Address:</strong> {{ $r['address'] }}</p>
                        <p><a href="/edit-restaurant/{{ $r->id }}">Edit</a></p>
                        <form action="/delete-restaurant/{{ $r->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </div>
                @endforeach

                @if($restaurants->isEmpty())
                    <p>No restaurants yet.</p>
                @endif
            @endauth
        </div>
    </div>
@endsection