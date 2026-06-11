@extends('layout.header1')

@section('content')
    <main class="container">

        {{-- Hero Section --}}
        <div class="p-4 p-md-5 mb-4 rounded text-body-emphasis bg-body-secondary">
            <h1>Discover Restaurants in Phnom Penh</h1>
            <p>Explore the best local and international dining spots across the city.</p>
            <a href="/menu" class="btn btn-primary">Browse All Restaurants</a>
        </div>

        {{-- Latest Restaurants --}}
        <h2 class="mb-3">Recently Added</h2>
        <div class="row">
            @foreach($restaurants as $r)
            <div class="col-md-4 mb-4">
                <div class="p-4 p-md-5 mb-4 rounded text-body-emphasis bg-body-secondary">
                    <h4>{{$r->name}}</h4>
                    <p><strong>Cuisine:</strong> {{$r->cuisine_type}}</p>
                    <p><strong>Address:</strong> {{$r->address}}</p>
                    <a href="/restaurant/{{$r->id}}" class="btn btn-primary">View</a>
                </div>
            </div>
            @endforeach
        </div>

        <div class="text-center mt-2 mb-4">
            <a href="/menu" class="btn btn-primary">Browse All Restaurants</a>
        </div>

    </main>
@endsection
