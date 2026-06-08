@extends ('layout.header1')
@section('content')

</div>
</div>

<section class="restaurant_detail_section layout_padding">
    <div class="container">

        <div class="heading_container heading_center mb-5">
            <h2>Pteas Bay Phum</h2>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-10">

                <div class="img-box text-center mb-5">
                    <img src="pic/Kh (pteah bay phum building).webp"
                         alt="Pteas Bay Phum"
                         style="width:100%; max-height:550px; object-fit:cover; border-radius:20px;">
                </div>

                <div class="detail-box">

                    <h3 class="mb-4">Pteas Bay Phum</h3>

                    <p>
                        Pteas Bay Phum is a popular Khmer restaurant that
                        celebrates the rich culinary traditions of Cambodia.
                        Combining traditional recipes with fresh local ingredients,
                        the restaurant offers an authentic dining experience in a
                        comfortable and welcoming atmosphere.
                    </p>

                    <p>
                        Guests can enjoy a wide variety of Cambodian dishes,
                        including Fish Amok, Beef Lok Lak, Khmer Red Curry,
                        Stir Fried Morning Glory, and many other local favorites.
                        Every meal is carefully prepared to preserve the original
                        flavors that have been enjoyed by Cambodian families for generations.
                    </p>

                    <p>
                        Whether visiting with family, friends, or colleagues,
                        Kravanh Restaurant provides a spacious environment and
                        friendly service that makes every meal memorable.
                        The restaurant is a great destination for both local
                        residents and tourists who want to experience authentic
                        Khmer cuisine.
                    </p>

                    <hr class="my-4">

                    <div class="row">

                        <div class="col-md-6">
                            <h5>Restaurant Information</h5>

                            <p>
                                <strong>Cuisine:</strong>
                                Traditional Khmer Food
                            </p>

                            <p>
                                <strong>Opening Hours:</strong>
                                9:00 AM – 10:00 PM
                            </p>

                            <p>
                                <strong>Location:</strong>
                                Phnom Penh, Cambodia
                            </p>

                            <p>
                                <strong>Contact:</strong>
                                +855 XX XXX XXX
                            </p>
                        </div>

                        <div class="col-md-6">
                            <h5>Popular Dishes</h5>

                            <ul>
                                <li>Fish Amok</li>
                                <li>Beef Lok Lak</li>
                                <li>Khmer Red Curry</li>
                                <li>Stir Fried Morning Glory</li>
                                <li>Nom Banh Chok</li>
                            </ul>
                        </div>

                    </div>

                    <div class="text-center mt-5">
                        <a href="#" class="btn btn-primary px-5 py-2">
                            Order Now
                        </a>
                    </div>

                </div>

            </div>
        </div>

    </div>
</section>

<div class="footer_container">

    <section class="info_section">
        <div class="container">
          <div class="contact_box">
                <a href="">
                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                </a>

                <a href="">
                    <i class="fa fa-phone" aria-hidden="true"></i>
                </a>

                <a href="">
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                </a>
            </div>

            <div class="social_box">
                <a href="">
                    <i class="fa fa-facebook" aria-hidden="true"></i>
                </a>

                <a href="">
                    <i class="fa fa-twitter" aria-hidden="true"></i>
                </a>

                <a href="">
                    <i class="fa fa-linkedin" aria-hidden="true"></i>
                </a>
            </div>

        </div>
    </section>

    <footer class="footer_section">
        <div class="container">
            <p>
                &copy; <span id="displayYear"></span> All Rights Reserved
            </p>
        </div>
    </footer>

</div>

<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>
<script src="js/custom.js"></script>

@endsection