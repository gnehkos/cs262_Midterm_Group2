@extends ('layout.header1')
@section('content')




  </br>
  </div>
  </div>

  <div class="slider_container">
    @forelse($foodImages as $fi)
      <div class="item">
        <div class="img-box">
          <a href="/restaurant/{{ $fi->restaurant->id }}" style="display:block;">
            <img src="{{ asset('storage/' . $fi->image_path) }}" alt="" style="width:100%;height:100%;object-fit:cover;" />
          </a>
        </div>
      </div>
    @empty
      <div class="item">
        <div class="img-box">
          <img src="{{ asset('images/r1.jpg') }}" alt="" />
        </div>
      </div>
    @endforelse
  </div>
  </section>
  <!-- end slider section -->
  </div>


  <!-- recipe section -->

  <section class="recipe_section layout_padding-top">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Our Best Popular Khmer Restaurant
        </h2>
      </div>
      <div class="row mt-5">

        <!-- Kravanh -->
        <div class="col-md-4 mb-4">

          <div class="card shadow-lg h-100">

            <img src="{{ asset('pic/Kh (Kravanh building).webp') }}" class="card-img-top"
              style="height:250px;object-fit:cover;">

            <div class="card-body">

              <h4>Kravanh Restaurant</h4>

              <p>
                Authentic Khmer cuisine with modern presentation and local flavors.
              </p>

              <p>
                <strong>Location:</strong><br>
                74 Oknha Ket St. (174), Phnom Penh
              </p>

              <p>
                <strong>Hours:</strong><br>
                11:00 AM–2:30 PM <br>
                5:30 PM–9:00 PM
              </p>

              <p>
                <strong>Phone:</strong><br>
                +855 12 539 977
              </p>

              <p>
                <strong>Best For:</strong><br>
                Fine Khmer Dining
              </p>

            </div>

          </div>

        </div>


        <!-- Phteah Bay Phoum -->
        <div class="col-md-4 mb-4">

          <div class="card shadow-lg h-100">

            <img src="{{ asset('pic/Kh (pteah bay phum building).webp') }}" class="card-img-top"
              style="height:250px;object-fit:cover;">

            <div class="card-body">

              <h4>Phteah Bay Phoum</h4>

              <p>
                Traditional home-style Cambodian food inspired by village recipes.
              </p>

              <p>
                <strong>Location:</strong><br>
                Street 370, Phnom Penh
              </p>

              <p>
                <strong>Hours:</strong><br>
                Daily 11:00 AM–10:00 PM
              </p>

              <p>
                <strong>Phone:</strong><br>
                +855 85 836 688
              </p>

              <p>
                <strong>Best For:</strong><br>
                Family Style Khmer Food
              </p>

            </div>

          </div>

        </div>


        <!-- Rumdoul -->
        <div class="col-md-4 mb-4">

          <div class="card shadow-lg h-100">

            <img src="{{ asset('pic/Kh (rumdou khmer building).jpg') }}" class="card-img-top"
              style="height:250px;object-fit:cover;">

            <div class="card-body">

              <h4>Rumdoul Khmer Restaurant</h4>

              <p>
                Traditional Cambodian cuisine with riverside atmosphere.
              </p>

              <p>
                <strong>Location:</strong><br>
                Sisowath Quay, Phnom Penh
              </p>

              <p>
                <strong>Hours:</strong><br>
                Daily 10:30 AM–10:30 PM
              </p>

              <p>
                <strong>Phone:</strong><br>
                +855 81 277 899
              </p>

              <p>
                <strong>Best For:</strong><br>
                Authentic Khmer Cuisine
              </p>

            </div>

          </div>

        </div>

      </div>

    </div>
  </section>



  </br>
  </br>
  </div>
  </div>
  <section id="restaurant" class="layout_padding">
    <div class="container">
      <h2 class="text-center mb-5">More Khmer Restaurants</h2>

      <div class=" mb-4">
        <a href="/dashboard" class="btn btn-primary">
          Add Restaurant
        </a>
      </div>
      <div class="row">

        @forelse($restaurants as $r)

          <div class="col-md-4 mb-4">
            <div class="card shadow h-100">

              <img src="{{ $r->image_path ? asset('storage/' . $r->image_path) : asset('images/r1.jpg') }}"
                class="card-img-top" style="height:200px; object-fit:cover;">

              <div class="card-body">

                <h4>{{ $r->name }}</h4>

                <p>{{ $r->description }}
                  @php $avg = $r->reviews->count() > 0 ? round($r->reviews->avg('rating')) : 0; @endphp
                <div class="mb-2">
                  @for($i = 1; $i <= 5; $i++)
                    <i class="fa fa-star{{ $i <= $avg ? '' : '-o' }}" style="color:#f5a623;"></i>
                  @endfor
                  <small style="color:#666;">({{ $r->reviews->count() }} reviews)</small>
                </div>
                </p>
                @auth
                  @if(auth()->id() == $r->user_id)
                    <a href="/edit-restaurant/{{ $r->id }}" class="btn btn-warning">Edit</a>
                  @endif
                @endauth
                <a href="/restaurant/{{ $r->id }}" class="btn btn-success">View More</a>


              </div>

            </div>
          </div>

        @empty

          <div class="col-12">
            <p class="text-center">
              No Chinese restaurants added yet.
            </p>
          </div>

        @endforelse

      </div>
    </div>
  </section>
@endsection