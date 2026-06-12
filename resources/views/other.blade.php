@extends ('layout.header1')
@section('content')

    </br>
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
    </div>
    </section>
    <!-- end slider section -->
    </div>


    <section id="restaurant" class="layout_padding">
        <div class="container">

            <div class="heading_container heading_center mb-5">
                <h2>Other Restaurants</h2>
                <p>Restaurants that don't fit one category — Western, fusion, desserts, cafes, and more.</p>
            </div>

            <div class="mb-4">
                <a href="/dashboard" class="btn btn-primary">Add Restaurant</a>
            </div>

            <div class="row">

                @forelse($restaurants as $r)
                    <div class="col-md-4 mb-4">
                        <div class="card shadow border-0 h-100">

                            <img src="{{ $r->image_path ? asset('storage/' . $r->image_path) : asset('images/r1.jpg') }}"
                                class="card-img-top" style="height:200px; object-fit:cover;" alt="{{ $r->name }}">

                            <div class="card-body d-flex flex-column">
                                <h5 class="fw-bold mb-1">{{ $r->name }}</h5>

                                @php $avg = $r->reviews->count() > 0 ? round($r->reviews->avg('rating')) : 0; @endphp
                                <div class="mb-2">
                                    @for($i = 1; $i <= 5; $i++)
                                        <i class="fa fa-star{{ $i <= $avg ? '' : '-o' }}" style="color:#f5a623;"></i>
                                    @endfor
                                    <small style="color:#666;">({{ $r->reviews->count() }}
                                        {{ $r->reviews->count() == 1 ? 'review' : 'reviews' }})</small>
                                </div>

                                @if($r->address)
                                    <p class="mb-1"><small><strong>Address:</strong> {{ $r->address }}</small></p>
                                @endif
                                @if($r->hours)
                                    <p class="mb-1"><small><strong>Hours:</strong> {{ $r->hours }}</small></p>
                                @endif
                                @if($r->phone)
                                    <p class="mb-1"><small><strong>Phone:</strong> {{ $r->phone }}</small></p>
                                @endif
                                @if($r->best_for)
                                    <p class="mb-1"><small><strong>Best For:</strong> {{ $r->best_for }}</small></p>
                                @endif

                                <p class="mt-2 mb-3" style="font-size:0.9rem;">{{ Str::limit($r->description, 80) }}</p>

                                <div class="mt-auto d-flex gap-2">
                                    @auth
                                        @if(auth()->id() == $r->user_id)
                                            <a href="/edit-restaurant/{{ $r->id }}" class="btn btn-warning btn-sm">Edit</a>
                                        @endif
                                    @endauth
                                    <a href="/restaurant/{{ $r->id }}" class="btn btn-success btn-sm">View More</a>
                                </div>
                            </div>

                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <p class="text-center">No other restaurants added yet. Be the first to add one!</p>
                    </div>
                @endforelse

            </div>
        </div>
    </section>


    </div>
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"
        integrity="sha256-Zr3vByTlMGQhvMfgkQ5BtWRSKBGa2QlspKYJnkjZTmo=" crossorigin="anonymous"></script>
    <script src="js/custom.js"></script>

    </body>

    </html>
@endsection