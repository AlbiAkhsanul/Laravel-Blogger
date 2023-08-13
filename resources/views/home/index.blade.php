@extends('layouts.main')

@section('container')
<div class="px-4 py-5 my-5 text-center">
    <img class="d-block mx-auto mb-4" src="img/laravel.png" alt="" width="72" height="72">
    <h1 class="display-5 fw-bold text-body-emphasis">Welcome</h1>
    <div class="col-lg-6 mx-auto">
      <p class="lead mb-4">Hello, welcome to my first laravel project. In this project i tried to make a simple blogger website using Laravel with the help of front-end framework Bootstrap. This is my solo project, and my media to learn about Laravel as my next step after learning the PHP language and also to learn about the Bootstrap framework.</p>
      <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
        <a href="/blog" class="btn btn-outline-danger btn-lg px-4 gap-3">Lets Get Started</a>
      </div>
    </div>
</div>
@endsection