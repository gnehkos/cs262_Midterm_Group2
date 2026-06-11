@extends('layout.header1')

@section('content')
    <main class="container my-4">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="p-4 p-md-5 mb-4 rounded text-body-emphasis bg-body-secondary">
                    <h4>LOGIN</h4>
                    <p>Welcome back! Log in to your account.</p>
                    <form action="/login" method="POST">
                        @csrf
                        <input type="text" name="loginname" class="form-control my-2" placeholder="Username">
                        <input type="password" name="loginpassword" class="form-control my-2" placeholder="Password">
                        <button type="submit" class="btn btn-primary my-2">LOGIN</button>
                    </form>
                    <p class="mt-3">Don't have an account? <a href="/signup">Sign up here</a></p>
                </div>
            </div>
        </div>
    </main>
@endsection