@extends ('layout.header1')
@section('content')





  </div>
  </div>

  <div class="slider_container" style="padding-top: 80px;">

    @foreach($foodImages as $fi)
      <div class="item">
        <div class="img-box" onclick="location.href='/restaurant/{{ $fi->restaurant->id }}'" style="cursor:pointer;">
          <img src="{{ asset('storage/' . $fi->image_path) }}" alt="" />
        </div>
      </div>
    @endforeach
    @foreach($restaurants->filter(fn($r) => $r->image_path) as $r)
      <div class="item">
        <div class="img-box" onclick="location.href='/restaurant/{{ $r->id }}'" style="cursor:pointer;">
          <img src="{{ asset('storage/' . $r->image_path) }}" alt="" />
        </div>
      </div>
    @endforeach
    @if($foodImages->isEmpty() && $restaurants->filter(fn($r) => $r->image_path)->isEmpty())
      <div class="item">
        <div class="img-box">
          <img src="{{ asset('images/r1.jpg') }}" alt="" />
        </div>
      </div>
    @endif
  </div>
  </section>
  <!-- end slider section -->
  </div>




  <section class="recipe_section layout_padding-top">
    <div class="container">

      <div class="heading_container heading_center">
        <h2>
          Explore Our Food Categories
        </h2>
      </div>

      <div class="row">

        <!-- Khmer Food -->

        <div class="col-sm-6 col-md-4 mx-auto">
          <div class="box">

            <div class="img-box">
              <img src="{{ asset('pic/k9.jpg') }}" class="box-img" alt="">
            </div>

            <div class="detail-box">

              <h4>
                Khmer Food
              </h4>

              <a href="/khmer">
                <i class="fa fa-arrow-right" aria-hidden="true"></i>
              </a>

            </div>

          </div>
        </div>


        <!-- Chinese Food -->

        <div class="col-sm-6 col-md-4 mx-auto">
          <div class="box">

            <div class="img-box">
              <img src="{{ asset('pic/c9.jpg') }}" class="box-img" alt="">
            </div>

            <div class="detail-box">

              <h4>
                Chinese Food
              </h4>

              <a href="/chinese">
                <i class="fa fa-arrow-right" aria-hidden="true"></i>
              </a>

            </div>

          </div>
        </div>


        <!-- Japanese Food -->

        <div class="col-sm-6 col-md-4 mx-auto">
          <div class="box">

            <div class="img-box">
              <img src="{{ asset('pic/j9.jpg') }}" class="box-img" alt="">
            </div>

            <div class="detail-box">

              <h4>
                Japanese Food
              </h4>

              <a href="/japanese">
                <i class="fa fa-arrow-right" aria-hidden="true"></i>
              </a>

            </div>

          </div>
        </div>




        <div class="col-sm-6 col-md-4 mx-auto">
          <div class="box">

            <div class="img-box">
              <img src="{{ asset('pic/ko9.webp') }}" class="box-img" alt="">
            </div>

            <div class="detail-box">

              <h4>
                Korean Food
              </h4>

              <a href="/korean">
                <i class="fa fa-arrow-right" aria-hidden="true"></i>
              </a>

            </div>

          </div>
        </div>

      </div>

    </div>
  </section>
  <section class="recipe_section layout_padding-top">
    <div class="container">

      <div class="heading_container heading_center mb-5">
        <h2>Create Your Own Restaurant</h2>
      </div>
      <div class="row g-4">

        @forelse($restaurants as $r)

          <div class="col-lg-3 col-md-6 mb-4">
            <div class="card shadow h-100">

              <img src="{{ $r->image_path ? asset('storage/' . $r->image_path) : asset('images/r1.jpg') }}"
                class="card-img-top" style="height:220px; object-fit:cover;" alt="">

              <div class="card-body text-center">

                <h4>{{ $r->name }}</h4>

                <p class="text-muted">
                  {{ $r->description }}
                  @php $avg = $r->reviews->count() > 0 ? round($r->reviews->avg('rating')) : 0; @endphp
                <div class="mb-2">
                  @for($i = 1; $i <= 5; $i++)
                    <i class="fa fa-star{{ $i <= $avg ? '' : '-o' }}" style="color:#f5a623;"></i>
                  @endfor
                  <small style="color:#666;">({{ $r->reviews->count() }}
                    {{ $r->reviews->count() == 1 ? 'review' : 'reviews' }})</small>
                </div>
                </p>

                <p>
                  <strong>{{ $r->cuisine_type }}</strong>
                </p>

                <a href="/restaurant/{{ $r->id }}" class="btn btn-success">
                  View & Rating
                </a>

              </div>

            </div>
          </div>

        @empty

          <div class="col-12">
            <p class="text-center">No restaurants yet.</p>
          </div>

        @endforelse

      </div>

      <div class="text-center mt-4">
        <a href="/allrestaurant" class="btn btn-success">
          View All Restaurants
        </a>
      </div>

    </div>
  </section>
@endsection