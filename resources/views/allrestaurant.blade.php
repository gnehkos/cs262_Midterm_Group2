@extends('layout.header1')
@section('content')

    </div>
    </div>
    </section>
    </div>

    <section class="about_section layout_padding">
        <div class="container">

            <div class="heading_container heading_center mb-5">
                <h2 style="color:#333;">All Restaurants</h2>
                <p style="color:#333;">Here are all the restaurants available.</p>
            </div>

            @php
                $cuisines = [
                    'Khmer' => '🇰🇭',
                    'Korean' => '🇰🇷',
                    'Japanese' => '🇯🇵',
                    'Chinese' => '🇨🇳',
                    'Other' => '🍽️',
                ];
            @endphp

            @foreach($cuisines as $cuisine => $flag)
                @php $filtered = $restaurants->where('cuisine_type', $cuisine); @endphp
                @if($filtered->count() > 0)

                    <h4 class="mb-3" style="color:#333;">{{ $flag }} {{ $cuisine }} Restaurants</h4>

                    <div class="row g-4 mb-5">
                        @foreach($filtered as $r)
                            <div class="col-lg-3 col-md-6">
                                <div class="card shadow border-0 h-100">

                                    <img src="{{ $r->image_path ? asset('storage/' . $r->image_path) : asset('images/r1.jpg') }}"
                                        class="card-img-top" style="height:200px; object-fit:cover;" alt="{{ $r->name }}">

                                    <div class="card-body text-center d-flex flex-column">
                                        <h5 class="fw-bold mb-1 text-dark">{{ $r->name }}</h5>

                                        @php $avg = $r->reviews->count() > 0 ? round($r->reviews->avg('rating')) : 0; @endphp
                                        <div class="mb-2">
                                            @for($i = 1; $i <= 5; $i++)
                                                <i class="fa fa-star{{ $i <= $avg ? '' : '-o' }}" style="color:#f5a623;"></i>
                                            @endfor
                                            <small style="color:#666;">({{ $r->reviews->count() }}
                                                {{ $r->reviews->count() == 1 ? 'review' : 'reviews' }})</small>
                                        </div>

                                        <p class="mb-3 text-dark" style="font-size:0.88rem;">{{ Str::limit($r->description, 80) }}</p>

                                        <div class="mt-auto">
                                            <a href="/restaurant/{{ $r->id }}" class="btn btn-success btn-sm px-3">View Details</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        @endforeach
                    </div>

                @endif
            @endforeach

        </div>
    </section>


@endsection