@extends ('layout.header1')

@section('content')


</br>
</div>
<main class="container text-white">


    <div class="p-4 p-md-5 mb-5 rounded"
         style="background: rgba(0,0,0,0.25);">

        <div class="row align-items-center">

            <div class="col-md-6">

                <h1 class="display-5 fw-bold">
                    Contact Us
                </h1>

                <p class="lead">
                    Have questions about restaurants or food recommendations?
                    We are here to help you.
                </p>

            </div>

            <div class="col-md-6">

                <img src="{{ asset('pic/pp.jpg') }}"
                     class="img-fluid rounded shadow"
                     style="width:100%;
                            height:300px;
                            object-fit:cover;">

            </div>

        </div>

    </div>

    
    <div class="row">

   
        <div class="col-md-6 mb-5">

            <h3 class="mb-4">
                Send Message
            </h3>

            <form>

                <div class="mb-3">

                    <label class="form-label">
                        Name
                    </label>

                    <input type="text"
                           class="form-control bg-light"
                           placeholder="Your name">

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Email
                    </label>

                    <input type="email"
                           class="form-control bg-light"
                           placeholder="Your email">

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Message
                    </label>

                    <textarea class="form-control bg-light"
                              rows="5"
                              placeholder="Your message"></textarea>

                </div>

                <button class="btn btn-warning text-dark px-4">

                    Send Message

                </button>

            </form>

        </div>


     
        <div class="col-md-6">

            <h3 class="mb-4">

                Get In Touch

            </h3>

            <p>

                Need restaurant recommendations or support?
                Contact us anytime.

            </p>

            <p>

                <strong>Location:</strong>
                Phnom Penh, Cambodia

            </p>

            <p>

                <strong>Phone:</strong>
                +855 12 345 678

            </p>

            <p>

                <strong>Email:</strong>
                delfood@email.com

            </p>

            <p>

                <strong>Opening Hours:</strong>
                8:00 AM - 10:00 PM

            </p>

            <img src="{{ asset('pic/pp1.jpg') }}"
                 class="img-fluid rounded shadow mt-3"
                 style="width:100%;
                        max-height:170px;
                        object-fit:cover;">

        </div>

    </div>

</main>

@endsection