@extends('layout.header1')

@section('content')


<section class="news_section layout_padding">
  <div class="container">

    <div class="heading_container heading_center">
      <h2>Latest Blog</h2>
    </div>

    <div class="row">

      <div class="col-md-6">
        <div class="box">

          <div class="img-box">
            <img src="{{ asset('images/n1.jpg') }}" class="box-img" alt="">
          </div>

          <div class="detail-box">
            <h4>Tasty Food For You</h4>

            <p>
              There isn't anything embarrassing hidden in the middle of text.
              All the Lorem Ipsum generators on the Internet tend to repeat predefined text.
            </p>

            <a href="">
              <i class="fa fa-arrow-right" aria-hidden="true"></i>
            </a>

          </div>

        </div>
      </div>

      <div class="col-md-6">
        <div class="box">

          <div class="img-box">
            <img src="{{ asset('images/n2.jpg') }}" class="box-img" alt="">
          </div>

          <div class="detail-box">

            <h4>Breakfast For You</h4>

            <p>
              There isn't anything embarrassing hidden in the middle of text.
              All the Lorem Ipsum generators on the Internet tend to repeat predefined text.
            </p>

            <a href="">
              <i class="fa fa-arrow-right" aria-hidden="true"></i>
            </a>

          </div>

        </div>
      </div>

    </div>

  </div>
</section>


@endsection