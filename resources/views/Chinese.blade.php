
     
@extends ('layout.header1')
@section('content')


        

    </div>  
  </div>       
        
    <div class="slider_container">
        <div class="item">
          <div class="img-box">
            <img src="pic/c1.avif" alt="" />
          </div>
        </div>
        <div class="item">
          <div class="img-box">
            <img src="pic/c2.jpg" alt="" />
          </div>
        </div>
        <div class="item">
          <div class="img-box">
            <img src="pic/c3.jpeg" alt="" />
          </div>
        </div>
        <div class="item">
          <div class="img-box">
            <img src="pic/c4.jpeg" alt="" />
          </div>
        </div>
        <div class="item">
          <div class="img-box">
            <img src="pic/c5.avif" alt="" />
          </div>
        </div>
        <div class="item">
          <div class="img-box">
            <img src="pic/c6.jpeg" alt="" />
          </div>
        </div>
        <div class="item">
          <div class="img-box">
            <img src="pic/c7.jpg" alt="" />
          </div>
        </div>
        <div class="item">
          <div class="img-box">
            <img src="pic/c8.webp" alt="" />
          </div>
        </div>
      </div>
    </section>
   
  </div>


  <!-- recipe section -->

  <section class="recipe_section layout_padding-top">
  <div class="container">

    <div class="heading_container heading_center">
      <h2>
        Best Popular Chinese Restaurants
      </h2>
    </div>

   <div class="row mt-5">

<!-- Tao Wa -->

<div class="col-md-4 mb-4">

<div class="card shadow-lg h-100">

<img src="{{ asset('pic/chi1.webp') }}"
class="card-img-top"
style="height:250px;object-fit:cover;">

<div class="card-body">

<h4>Tao Wa Restaurant (淘蛙)</h4>

<p>
Authentic Chinese restaurant specializing in frog-based dishes and Chinese regional flavors.
</p>

<p>
<strong>Location:</strong><br>
Cambodia, Phnom Penh Street 310 8CE0
</p>

<p>
<strong>Hours:</strong><br>
11:00 AM–2:00 AM Daily
</p>

<p>
<strong>Phone:</strong><br>
023 722 888
</p>

<p>
<strong>Best For:</strong><br>
Sichuan cuisine and spicy food lovers
</p>

</div>

</div>

</div>


<!-- Ancle Hai -->

<div class="col-md-4 mb-4">

<div class="card shadow-lg h-100">

<img src="{{ asset('pic/un5.webp') }}"
class="card-img-top"
style="height:250px;object-fit:cover;">

<div class="card-body">

<h4>Ancle Hai Hotpot</h4>

<p>
Interactive buffet hot pot experience with meats, seafood, and vegetables.
</p>

<p>
<strong>Location:</strong><br>
152 Street 257, Phnom Penh
</p>

<p>
<strong>Hours:</strong><br>
11:00 AM–10:00 PM Daily
</p>

<p>
<strong>Phone:</strong><br>
+855 70 991 186
</p>

<p>
<strong>Best For:</strong><br>
Group gatherings and hot pot lovers
</p>

</div>

</div>

</div>


<!-- Xiao Ge -->

<div class="col-md-4 mb-4">

<div class="card shadow-lg h-100">

<img src="{{ asset('pic/xi7.jpg') }}"
class="card-img-top"
style="height:250px;object-fit:cover;">

<div class="card-body">

<h4>Xiao Ge Hot Pot</h4>

<p>
Premium hot pot restaurant known for fresh seafood and quality ingredients.
</p>

<p>
<strong>Location:</strong><br>
Street 360, BKK, Phnom Penh
</p>

<p>
<strong>Hours:</strong><br>
11:00 AM–10:00 PM Daily
</p>

<p>
<strong>Phone:</strong><br>
+855 69 326 556
</p>

<p>
<strong>Best For:</strong><br>
Premium hot pot experience
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
<h2 class="text-center mb-5">More Chinese Restaurants</h2>

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
          <a href="/edit-restaurant/{{ $r->id }}"
              class="btn btn-warning"> Edit </a>

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
