@extends('layouts.main')

@section('container')
<div class="row justify-content-center">
    <div class="col-lg-4 mt-4">
        <main class="form-registration w-100 m-auto">
            <p class="text-secondary"><span class="navbar-brand fw-bold text-danger fs-4 me-1">COBA Blog<i class="bi bi-lightbulb"></i></span>My Testing Blog Page</p>

            <form action="/register" method="post">
              {{-- CSRF token --}}
              @csrf

              <p class="h3 mb-3 fw-normal">Register</p>
              <div class="form-floating mb-1">
                <input type="email" name="email" class="form-control rounded-top @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" value="{{old('email')}}" required>
                <label for="email">Email address</label>
                @error('email')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
                @enderror
              </div>
              <div class="form-floating mb-1">
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" required>
                <label for="password">Password</label>
                @error('password')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
                @enderror
              </div>
              <div class="form-floating mb-1">
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Your Name" value="{{old('name')}}" required>
                <label for="name">Name</label>
                @error('name')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
                @enderror
              </div>
              <div class="form-floating">
                <input type="text" name="username" class="form-control rounded-bottom @error('username') is-invalid @enderror" id="username" placeholder="Display Name" value="{{old('username')}}" required>
                <label for="username">Username</label>
                @error('username')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
                @enderror
              </div>

              <button class="w-100 btn btn-lg btn-danger mt-3" type="submit">Register</button>
            </form>
            <hr class="bg-danger border-2 border-top border-danger">
            <small class="text-secondary d-block text-center">Already have account? <a href="/login" class="text-black fw-bold">Login!</a></small>   
        </main>
        {{-- <p class="mt-5 mb-3 text-body-secondary">&copy; 2023–2023</p> --}}
    </div>
</div>
@endsection