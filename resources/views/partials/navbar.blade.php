<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark" aria-label="Main navigation">
<div class="container-fluid">
  <a class="navbar-brand" href="/home">COBA Blog</a>
  <button class="navbar-toggler p-0 border-0" type="button" id="navbarSideCollapse" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
        <a class="nav-link {{ Request::is('/')||Request::is('home') ? 'active' : '' }}" aria-current="page" href="/home">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Request::is('about') ? 'active' : '' }}" href="about">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Request::is('blog') ? 'active' : '' }}" href="/blog">Blog</a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Request::is('categories') ? 'active' : '' }}" href="/categories">Categories</a>
      </li>
      @auth
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle active" href="#" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-person-fill me-1 align-baseline"></i>{{auth()->user()->username}}</a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="/dashboard">Dashboard</a></li>
          <li><a class="dropdown-item" href="#">Settings</a></li>
          <li><a class="dropdown-item" href="#">Profile</a></li>
          <li><hr class="dropdown-divider"></li>
          <li>
            <form action="/logout" method="post">
            {{-- CSRF Token --}}
            @csrf
            <button type="submit" class="dropdown-item" onclick="return confirm('Apakah anda yakin ingin logout?')"><i class="bi bi-box-arrow-left me-2"></i>Logout</button>
            </form>
          </li>
        </ul>
      </li>
      @else
      <li class="nav-item">
        <a class="nav-link active" href="/login">Login</a>
      </li>
      @endauth
    </ul>
    <form class="d-flex" role="search">
      @if (request('category'))
        <input type="hidden" name="category" value="{{request('category')}}">
      @endif
      @if (request('user'))
        <input type="hidden" name="user" value="{{request('user')}}">
      @endif
      <input class="form-control me-2 {{ Request::is('blog') ? '' : 'visually-hidden' }}" type="search" placeholder="Search" aria-label="Search" name="search" value="{{request('search')}}">
      <button class="btn btn-outline-success {{ Request::is('blog') ? '' : 'visually-hidden' }}" type="submit"><i class="bi bi-search"></i></button>
    </form>
  </div>
</div>
</nav>