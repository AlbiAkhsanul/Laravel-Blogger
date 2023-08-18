@extends('layouts.main')

@section('containerAbout')
<div id="myCarousel" class="carousel slide mb-6" data-bs-ride="carousel" data-bs-theme="light">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        {{-- <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="var(--bs-secondary-color)"/></svg> --}}
        <div style="overflow: hidden" width="100%" height="100%">
          <img src="img/laravel_bg3.jpg" alt="laravel.bg" style="min-width: 100%">
        </div>
        <div class="container">
          <div class="carousel-caption text-start">
            <h1>Welcome To My First Laravel Project</h1>
            <p class="opacity-75">In this project i tried to make a simple blogger website using Laravel.</p>
            <p><a class="btn btn-lg btn-danger" href="/blog">Blog Page</a></p>
         </div>
        </div>
      </div>
      <div class="carousel-item">
        {{-- <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="var(--bs-secondary-color)"/></svg> --}}
        <div style="overflow: hidden" width="100%" height="100%">
          <img src="img/laravel_bg3.jpg" alt="laravel.bg" style="min-width: 100%">
        </div>
        <div class="container">
          <div class="carousel-caption">
            <h1>Features In This Website</h1>
            <p>We Have The Basic CRUD, Authentication and Authorization Mechanism</p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        {{-- <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="var(--bs-secondary-color)"/></svg> --}}
        <div style="overflow: hidden" width="100%" height="100%">
          <img src="img/laravel_bg3.jpg" alt="laravel.bg" style="min-width: 100%">
        </div>
        <div class="container">
          <div class="carousel-caption text-end">
            <h1>Lets Get Started</h1>
            <p>Get To Know More About This Website</p>
            <p><a class="btn btn-lg btn-danger" href="/login">Lets Go</a></p>
          </div>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <!-- Marketing messaging and featurettes
  ================================================== -->
  <!-- Wrap the rest of the page in another container to center all the content. -->

  <div class="container marketing">

    <div class="mb-4">
      <h1 class="text-center">About Me</h1>
    </div>

    <!-- Three columns of text below the carousel -->
    <div class="row">
      <div class="col-lg-4">
        <img src="img/UPN.jpg" alt="education" class="rounded-circle" width="140" height="140">
        <h2 class="fw-normal">Education</h2>
        <p>Right now i am a student at UPN "Veteran" Jawa Timur University In Indonesia, an undergraduate Informatic Engineering student.</p>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
        <img src="img/laptopTikom.jpg" alt="ambition" class="rounded-circle" width="140" height="140">
        <h2 class="fw-normal">Ambition</h2>
        <p>I want to be a full-stack develeport especially in the Web Developing industry.</p>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
        <img src="img/stasiunJombang.jpg" alt="hobby" class="rounded-circle" width="140" height="140">
        <h2 class="fw-normal">Hobby</h2>
        <p>I like to learn something new that i found interesting, i like to play some video games and going to the gym.</p>
      </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->


    <!-- START THE FEATURETTES -->

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7">
        <h2 class="featurette-heading fw-normal lh-1">
          Programming Skills. <span class="text-body-secondary">Some Programming Language I Have Learned.</span></h2>
        <p class="lead">I have learned basic vanilla C++ in my some of my first projects, have basic understanding in JavaScript and Pyhton but for now i am mostly doing some backend website developing so my main programming language is PHP and some basic CSS. But, i am not planning to stop learning other language anytime soon.</p>
      </div>
      <div class="col-md-5">
        <img src="img/programming_language.jpg" alt="programming_language" width="500" height="500" class="img-fluid mx-auto">
      </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7 order-md-2">
        <h2 class="featurette-heading fw-normal lh-1">Programming Experience. <span class="text-body-secondary">Some Of My Projects.</span></h2>
        <p class="lead">Some of my notable projects are this blogger website, basic turn base game using C++, a portfolio website and school website with basic vanilla PHP. You can find more of my projects in my <a href="https://github.com/AlbiAkhsanul">Github Page</a>.</p>
      </div>
      <div class="col-md-5 order-md-1">
        <img src="img/project.jpg" alt="programming_language" width="500" height="500" class="img-fluid mx-auto">
      </div>
    </div>

  </div><!-- /.container -->
@endsection