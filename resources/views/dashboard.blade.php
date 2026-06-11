@extends('layout.header1')
@section('content')

</div>

<section class="about_section layout_padding">

<div class="container">

<div class="col-md-11 col-lg-10 mx-auto">

<div class="heading_container heading_center">

<h2 class="text-white">
Add a Restaurant!
</h2>

</div>

</div>

</div>

<br>

<main class="container-fluid px-5">

@auth

<div class="row justify-content-center">

<div class="col-lg-11">

<!-- FORM CARD -->

<div class="p-5 mb-5 rounded shadow-lg bg-white">

<form action="/create-restaurant"
method="POST"
enctype="multipart/form-data">

@csrf

<div class="row g-4 justify-content-center">

<div class="col-lg-5 col-md-7 mb-4">

<input
        type="text"
        name="name"
        class="form-control form-control-lg"
        placeholder="Restaurant Name">

</div>

<div class="col-lg-3 col-md-6 mb-4">

<input
type="text"
name="address"
class="form-control form-control-lg"
placeholder="Address">

</div>

<div class="col-lg-3 col-md-6 mb-4">

<select
name="cuisine_type"
class="form-select form-select-lg">

<option value="">
-- Select Cuisine --
</option>

<option value="Khmer">Khmer</option>

<option value="Korean">Korean</option>

<option value="Japanese">Japanese</option>

<option value="Chinese">Chinese</option>

<option value="Other">Other</option>

</select>

</div>

</div>

<div class="mb-4">

<textarea
name="description"
rows="6"
class="form-control form-control-lg"
placeholder="Description..."></textarea>

</div>

<div class="mb-4">

<label class="fw-bold">

Restaurant Image (optional)

</label>

<input
type="file"
name="image"
class="form-control mt-2">

</div>

<button
type="submit"
name="submit"
class="btn btn-primary btn-lg px-4">

Add Restaurant

</button>

</form>

</div>

</div>

</div>

<!-- MY RESTAURANTS -->

<h2 class="text-center text-white mb-5">

My Restaurants

</h2>

<div class="row">

@foreach($restaurants as $r)

<div class="col-md-4 mb-4">

<div class="card shadow-lg border-0 h-100">

@if($r->image_path)

<img
src="{{ asset('storage/' . $r->image_path) }}"
class="card-img-top"
style="height:230px; object-fit:cover;">

@endif

<div class="card-body">

<h4 class="fw-bold">

{{ $r['name'] }}

</h4>

<p>

<strong>Cuisine:</strong>

{{ $r['cuisine_type'] }}

</p>

<p>

<strong>Address:</strong>

{{ $r['address'] }}

</p>

<p>

{{ $r['description'] }}

</p>

<div class="d-flex justify-content-between">

<a
href="/edit-restaurant/{{ $r->id }}"
class="btn btn-warning">

Edit

</a>

<form
action="/delete-restaurant/{{ $r->id }}"
method="POST">

@csrf

@method('DELETE')

<button class="btn btn-danger">

Delete

</button>

</form>

</div>

</div>

</div>

</div>

@endforeach

</div>

@if($restaurants->isEmpty())

<h4 class="text-center text-white">

No restaurants yet.

</h4>

@endif

@endauth

</main>

</section>

@endsection