<!doctype html>
<html lang="en" data-bs-theme="auto">
<head><script src="../assets/js/color-modes.js"></script>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="Albi Akhsanul Hakim">
  <title>Personal Blog | {{ $title }}</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <!-- Custom styles for this template -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="/css/dashboard.css" rel="stylesheet">
  {{-- Trix Editor --}}
  <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
  <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
<style>
  html{
      height: 100%;
  }
  body{
      position: relative;
      margin: 0;
      min-height: 100%;
      padding-bottom: 8rem;
  }
  footer{
      position: absolute;
      right: 0;
      left: 0;
      bottom: 0;
  }
  @media screen and (min-width: 400px) {
    #secondaryPost {
      height: 400px;
    } 
  }
  /* Hide the file upload button on trix editor */
  trix-toolbar [data-trix-button-group="file-tools"]{
    display: none;
  }
</style>
</head>
<body>

@include('dashboard.layouts.header')

<div class="container-fluid">
  <div class="row">
    @include('dashboard.layouts.sidebar')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      @yield('container')
    </main>
  </div>
</div>


@include('partials.footer')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

<script src="/js/dashboard.js"></script>
</body>
</html>