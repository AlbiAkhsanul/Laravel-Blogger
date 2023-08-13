<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Personal Blog | {{ $title }}</title>

    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    {{-- Bootstrap Icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    {{-- My CSS --}}
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/offcanvas-navbar.css">
    <link rel="stylesheet" href="/css/carousel.css">

    <style>
        html{
            height: 100%;
        }
        body{
            position: relative;
            margin: 0;
            min-height: 100%;
            padding-bottom: 12rem;
        }
        footer{
            position: absolute;
            right: 0;
            left: 0;
            bottom: 0;
        }
    </style>
</head>
<body>

@include('partials.navbar')

<div style="width: 100%">
    @yield('containerAbout')
</div>

<div class="container mt-3">
    @yield('container')
</div>

@include('partials.footer')
<!-- Script -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src="/js/offcanvas-navbar.js"></script>
</body>
</html>