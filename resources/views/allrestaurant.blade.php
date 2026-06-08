@extends ('layout.header1')
@section('content')

<section class="recipe_section layout_padding-top" style="min-height: 100vh;">
  <div class="container">
    <div class="heading_container heading_center">
      <h2>My Restaurants</h2>
      <p>All restaurants added by this user.</p>
    </div>

    <div class="row">
      @forelse($restaurants as $r)
        <div class="col-sm-6 col-md-4 mb-4">
          <div class="box h-100">
            <div class="img-box">
              <img src="{{ $r->image_path ? asset('storage/' . $r->image_path) : asset('images/r1.jpg') }}" class="box-img" alt="{{ $r->name }}">
            </div>

            <div class="detail-box">
              <h4>{{ $r->name }}</h4>
              <p>{{ $r->cuisine_type }}</p>

              <div class="d-flex align-items-center justify-content-between">
                <a href="/restaurant/{{ $r->id }}">
                </a>

            
              </div>
            </div>
          </div>
        </div>
      @empty
        <div class="col-12">
          <p class="text-center">No restaurants added yet.</p>
        </div>
      @endforelse
    </div>
  </div>
</section>

@endsection
