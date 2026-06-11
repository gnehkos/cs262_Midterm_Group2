@extends ('layout.header1')
@section('content')


</div>

<section class="about_section layout_padding">

    <div class="container">

        <div class="heading_container heading_center mb-5">
            <h2 class="text-white">All Restaurants</h2>
            <p class="text-white">
                Here are all the restaurants available.
            </p>
        </div>

        <!-- KHMER -->
        <h3 class="text-white mb-4">🇰🇭 Khmer Restaurants</h3>

        <div class="row g-4 mb-5">
            @foreach($restaurants->where('cuisine_type', 'Khmer') as $r)
                <div class="col-lg-3 col-md-6">
                    <div class="card shadow h-100">

                        <img src="{{ $r->image_path ? asset('storage/'.$r->image_path) : asset('images/r1.jpg') }}"
                             class="card-img-top"
                             style="height:220px; object-fit:cover;">

                        <div class="card-body text-center">
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

                            <a href="/restaurant/{{ $r->id }}"
                               class="btn btn-success">
                                View Details
                            </a>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>

        <!-- KOREAN -->
        <h3 class="text-white mb-4">🇰🇷 Korean Restaurants</h3>

        <div class="row g-4 mb-5">
            @foreach($restaurants->where('cuisine_type', 'Korean') as $r)
                <div class="col-lg-3 col-md-6">
                    <div class="card shadow h-100">

                        <img src="{{ $r->image_path ? asset('storage/'.$r->image_path) : asset('images/r1.jpg') }}"
                             class="card-img-top"
                             style="height:220px; object-fit:cover;">

                        <div class="card-body text-center">
                            <h4>{{ $r->name }}</h4>
                            <p>{{ $r->description }}</p>

                            <a href="/restaurant/{{ $r->id }}"
                               class="btn btn-success">
                                View Details
                            </a>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>

        <!-- JAPANESE -->
        <h3 class="text-white mb-4">🇯🇵 Japanese Restaurants</h3>

        <div class="row g-4 mb-5">
            @foreach($restaurants->where('cuisine_type', 'Japanese') as $r)
                <div class="col-lg-3 col-md-6">
                    <div class="card shadow h-100">

                        <img src="{{ $r->image_path ? asset('storage/'.$r->image_path) : asset('images/r1.jpg') }}"
                             class="card-img-top"
                             style="height:220px; object-fit:cover;">

                        <div class="card-body text-center">
                            <h4>{{ $r->name }}</h4>
                            <p>{{ $r->description }}
                                @php $avg = $r->reviews->count() > 0 ? round($r->reviews->avg('rating')) : 0; @endphp
<div class="mb-2">
    @for($i = 1; $i <= 5; $i++)
        <i class="fa fa-star{{ $i <= $avg ? '' : '-o' }}" style="color:#f5a623;"></i>
    @endfor
    <small style="color:#666;">({{ $r->reviews->count() }} {{ $r->reviews->count() == 1 ? 'review' : 'reviews' }})</small>
</div>
                            </p>

                            <a href="/restaurant/{{ $r->id }}"
                               class="btn btn-success">
                                View Details
                            </a>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>

        <!-- CHINESE -->
        <h3 class="text-white mb-4">🇨🇳 Chinese Restaurants</h3>

        <div class="row g-4 mb-5">
            @foreach($restaurants->where('cuisine_type', 'Chinese') as $r)
                <div class="col-lg-3 col-md-6">
                    <div class="card shadow h-100">

                        <img src="{{ $r->image_path ? asset('storage/'.$r->image_path) : asset('images/r1.jpg') }}"
                             class="card-img-top"
                             style="height:220px; object-fit:cover;">

                        <div class="card-body text-center">
                            <h4>{{ $r->name }}</h4>
                            <p>{{ $r->description }}</p>

                            <a href="/restaurant/{{ $r->id }}"
                               class="btn btn-success">
                                View Details
                            </a>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>

    </div>

</section>

<script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
  <!-- bootstrap js -->
<script src="{{ asset('js/bootstrap.js') }}"></script>
  <!-- slick  slider -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.js"></script>
  <!-- nice select -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js" integrity="sha256-Zr3vByTlMGQhvMfgkQ5BtWRSKBGa2QlspKYJnkjZTmo=" crossorigin="anonymous"></script>
  <!-- custom js -->
<script src="{{ asset('js/custom.js') }}"></script>


@endsection
