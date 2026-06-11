
     
@extends ('layout.header1')
@section('content')


        
                
        
     </div>
    </div>

    <div class="slider_container">
        <div class="item">
          <div class="img-box">
            <img src="pic/k1.jpg" alt="" />
          </div>
        </div>
        <div class="item">
          <div class="img-box">
            <img src="pic/ko1.avif" alt="" />
          </div>
        </div>
        <div class="item">
          <div class="img-box">
            <img src="pic/c1.avif" alt="" />
          </div>
        </div>
        <div class="item">
          <div class="img-box">
            <img src="pic/j1.jpg" alt="" />
          </div>
        </div>
        <<div class="item">
          <div class="img-box">
            <img src="pic/k2.jpg" alt="" />
          </div>
        </div>
        <div class="item">
          <div class="img-box">
            <img src="pic/ko2.webp" alt="" />
          </div>
        </div>
        <div class="item">
          <div class="img-box">
            <img src="pic/c2.jpg" alt="" />
          </div>
        </div>
        <div class="item">
          <div class="img-box">
            <img src="pic/j3.jpg" alt="" />
          </div>
        </div>
        <div class="item">
          <div class="img-box">
            <img src="pic/k3.jpg" alt="" />
          </div>
        </div>
        <div class="item">
          <div class="img-box">
            <img src="pic/ko3.webp" alt="" />
          </div>
        </div>
       
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
                         class="card-img-top"
                         style="height:220px; object-fit:cover;"
                         alt="">

                    <div class="card-body text-center">

                        <h4>{{ $r->name }}</h4>

                        <p class="text-muted">
                            {{ $r->description }}
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

<section class="app_section">
  <div class="container">
    <div class="col-md-9 mx-auto">
      <div class="row">

        <div class="col-md-7 col-lg-8">
          <div class="detail-box">

            <h2>
              <span> Get the</span> <br>
              Delfood App
            </h2>

            <p>
              Discover the best restaurants in Phnom Penh with Delfood App. 
              Explore Khmer, Chinese, Japanese, and Korean cuisines, browse restaurant recommendations, 
              check restaurant locations and opening hours, and find your next favorite place to eat anytime.
            </p>

            <div class="app_btn_box">

              <a href="" class="mr-1">
                <img src="images/google_play.png" class="box-img" alt="">
              </a>

              <a href="">
                <img src="images/app_store.png" class="box-img" alt="">
              </a>

            </div>

            <a href="" class="download_btn">
              Download Now
            </a>

          </div>
        </div>

        <div class="col-md-5 col-lg-4">
          <div class="img-box">
            <img src="images/mobile.png" class="box-img" alt="">
          </div>
        </div>

      </div>
    </div>
  </div>
</section>


<!-- footer section -->

<footer class="footer_section">
  <div class="container">

    <p>
      &copy; <span id="displayYear"></span> All Rights Reserved By
      Delfood Team <br>

      Discover Restaurants • Explore Foods • Enjoy Dining
    </p>

  </div>
</footer>


    <!-- footer section -->

  </div>
  <!-- jQery -->
 
      <script src="js/jquery-3.4.1.min.js"></script>
  <!-- bootstrap js -->
  <script src="js/bootstrap.js"></script>
  <!-- slick  slider -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.js"></script>
  <!-- nice select -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js" integrity="sha256-Zr3vByTlMGQhvMfgkQ5BtWRSKBGa2QlspKYJnkjZTmo=" crossorigin="anonymous"></script>
  <!-- custom js -->
  <script src="js/custom.js"></script>
 

</body>

</html>
@endsection
