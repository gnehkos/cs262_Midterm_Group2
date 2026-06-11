
     
@extends ('layout.header1')
@section('content')


        
                
        
    </div>
    </div>

    <div class="slider_container">
        <div class="item">
          <div class="img-box">
            <img src="pic/ko1.avif" alt="" />
          </div>
        </div>
        <div class="item">
          <div class="img-box">
            <img src="pic/ko2.webp" alt="" />
          </div>
        </div>
        <div class="item">
          <div class="img-box">
            <img src="pic/ko3.webp" alt="" />
          </div>
        </div>
        <div class="item">
          <div class="img-box">
            <img src="pic/ko4.jpg" alt="" />
          </div>
        </div>
        <div class="item">
          <div class="img-box">
            <img src="pic/ko5.jpg" alt="" />
          </div>
        </div>
        <div class="item">
          <div class="img-box">
            <img src="pic/ko6.webp" alt="" />
          </div>
        </div>
        <div class="item">
          <div class="img-box">
            <img src="pic/ko7.webp" alt="" />
          </div>
        </div>
        <div class="item">
          <div class="img-box">
            <img src="pic/ko8.webp" alt="" />
          </div>
        </div>
      </div>
    </section>
    <!-- end slider section -->
  </div>


  <!-- recipe section -->

  <section class="recipe_section layout_padding-top">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Best Popular Korean Restaurants
        </h2>
      </div>
     <div class="row mt-5">

<!-- Bonchon -->

<div class="col-md-4 mb-4">

<div class="card shadow-lg h-100">

<img src="{{ asset('pic/bn.jpg') }}"
class="card-img-top"
style="height:250px;object-fit:cover;">

<div class="card-body">

<h4>Bonchon Cambodia</h4>

<p>
Popular Korean fried chicken restaurant famous for crispy double-fried chicken.
</p>

<p>
<strong>Location:</strong><br>
Bonchon BKK, Street 306, BKK1, Phnom Penh
</p>

<p>
<strong>Hours:</strong><br>
Daily, 9:00 AM – 9:00 PM
</p>

<p>
<strong>Phone:</strong><br>
+855 23 992 944
</p>

<p>
<strong>Best For:</strong><br>
Korean fried chicken lovers
</p>

</div>

</div>

</div>


<!-- Dori Dori -->

<div class="col-md-4 mb-4">

<div class="card shadow-lg h-100">

<img src="{{ asset('pic/dori.webp') }}"
class="card-img-top"
style="height:250px;object-fit:cover;">

<div class="card-body">

<h4>Dori Dori Korean Buffet</h4>

<p>
Affordable all-you-can-eat Korean buffet with many Korean favorites.
</p>

<p>
<strong>Location:</strong><br>
Doridori Korean Buffet - Aeon Mall Phnom Penh
</p>

<p>
<strong>Hours:</strong><br>
Daily, 9:00 AM – 10:00 PM
</p>

<p>
<strong>Phone:</strong><br>
+855 99 889 785
</p>

<p>
<strong>Best For:</strong><br>
Korean buffet dining
</p>

</div>

</div>

</div>


<!-- Yummy Korea -->

<div class="col-md-4 mb-4">

<div class="card shadow-lg h-100">

<img src="{{ asset('pic/yk.webp') }}"
class="card-img-top"
style="height:250px;object-fit:cover;">

<div class="card-body">

<h4>Yummy Korea Restaurant</h4>

<p>
Casual Korean restaurant known for tteokbokki and Korean comfort food.
</p>

<p>
<strong>Location:</strong><br>
Yammy Korea Toppoki Phnom Penh, Street 193
</p>

<p>
<strong>Hours:</strong><br>
Daily, 10:30 AM – 8:30 PM
</p>

<p>
<strong>Phone:</strong><br>
+855 15 732 777
</p>

<p>
<strong>Best For:</strong><br>
Korean street food lovers
</p>

</div>

</div>

</div>

</div>

</div>

</section>

<br><br>

</div>
</div>

<section id="restaurant" class="layout_padding">
<div class="container">
<h2 class="text-center mb-5">More Korean Restaurants</h2>

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
             class="card-img-top"
             style="height:200px; object-fit:cover;">

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
```

    <!-- footer section -->

  </div>

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
