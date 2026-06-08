<!DOCTYPE html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Delfood</title>


  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}" />

<link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" />

<link href="{{ asset('css/style.css') }}" rel="stylesheet" />

<link href="{{ asset('css/responsive.css') }}" rel="stylesheet" />

<img src="{{ asset('images/menu.png') }}" alt="">

</head>

<body class="sub_page">

  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container">
          <a class="navbar-brand" href="/index">
            <span>
              Delfood
            </span>
          </a>
          <div class="" id="">
            <div class="User_option">
              <a href="">
                <i class="fa fa-user" aria-hidden="true"></i>
                <span>Log Out</span>
              </a>
              <form class="form-inline ">
                <input type="search" placeholder="Search" />
                <button class="btn  nav_search-btn" type="submit">
                  <i class="fa fa-search" aria-hidden="true"></i>
                </button>
              </form>
            </div>
            <div class="custom_menu-btn">
              <button onclick="openNav()">
                <img src="images/menu.png" alt="">
              </button>
            </div>
            <div id="myNav" class="overlay">
              <div class="overlay-content">
              <a href="/home">Home</a>
                <a href="/menu">Menu</a>
                <a href="/khmer">Khmer</a>
                <a href="/korean">Korean</a>
                <a href="/japanese">Japanese</a>
                <a href="/chinese">Chinese</a>
                <a href="/contact">Contact Us</a>
                <a href="/dashboard">Create Post</a>
              </div>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->
  </div>


  <!-- about section -->

  <section class="about_section layout_padding">
    <div class="container">
      <div class="col-md-11 col-lg-10 mx-auto">
        <div class="heading_container heading_center">
          <h2>
            Edit Your Post
          </h2>
        </div>
      </div>
    </div>
</br>

<main class="container">
   

    <div class="p-4 p-md-5 mb-4 rounded text-body-emphasis bg-body-secondary">

        <form action="/edit-post/{{$post->id}}" method="POST">

            @csrf
            @method('PUT')

            <label class="form-label">Post Title</label>
            <input
                type="text"
                name="title"
                class="form-control"
                value="{{$post->title}}"
                class="my-2"
            >
            <label class="form-label">Body Title</label>
            <textarea name="body" type="text" class="form-control">{{$post->body}}</textarea>
            <button type="submit" class="btn btn-primary my-2">
                Save Changes
            </button>

        </form>


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

</main>


