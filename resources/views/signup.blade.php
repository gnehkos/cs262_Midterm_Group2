@extends('layout.header1')

@section('content')
    <main class="container my-4">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="p-4 p-md-5 mb-4 rounded text-body-emphasis bg-body-secondary">
                    <h4>SIGN UP</h4>
                    <p>Create a new account!</p>
                    <form action="/register" method="POST">
                        @csrf
                        <input type="text" name="name" class="form-control my-2" placeholder="Username">
                        <input type="password" name="password" class="form-control my-2" placeholder="Password">
                        <input type="password" name="password_confirmation" class="form-control my-2" placeholder="Repeat Password">
                        <input type="email" name="email" class="form-control my-2" placeholder="E-mail">
                        <button type="submit" class="btn btn-primary my-2">SIGN UP</button>
                    </form>
                    <p class="mt-3">Already have an account? <a href="/login">Log in here</a></p>
                </div>
            </div>
        </div>
    </main>
@endsection