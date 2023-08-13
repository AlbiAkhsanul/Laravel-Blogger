<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
    <div class="container">
      <a class="navbar-brand fw-bold" href="/">COBA Blog</a>

      <div class="navbar-toggler me-auto my-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <i class="bi bi-three-dots-vertical"></i>
      </div>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('about') ? 'active' : '' }}" href="/about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('blog') ? 'active' : '' }}" href="/blog">Blog</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('categories') ? 'active' : '' }}" href="/categories">Categories</a>
          </li>
        </ul>       
      </div>
      
        @if (Request::is('blog'))
        <div class="navbar-toggler my-2" type="button" data-bs-toggle="collapse" data-bs-target="#searchNav" aria-controls="searchNav"   aria-expanded="false" aria-label="Toggle navigation">
          <i class="bi bi-search"></i>
        </div>
        <div class="collapse navbar-collapse" id="searchNav">
          <form action="/blog" method="get" class="d-flex me-auto" role="search">
            @if (request('category'))
              <input type="hidden" name="category" value="{{request('category')}}">
            @endif
            @if (request('user'))
              <input type="hidden" name="user" value="{{request('user')}}">
            @endif
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search" value="{{request('search')}}">
            <button class="btn btn-outline-light d-flex" type="submit">
             <i class="bi bi-search me-2"></i>Search
            </button>
          </form>
        </div>
        @endif

        <ul class="navbar-nav ms-auto">
        @auth
         <div class="nav-item dropdown my-1">
           <button class="dropdown-toggle btn btn-outline-light ms-2" type="button" role="button" data-bs-toggle="dropdown"   aria-expanded="false">
            <i class="bi bi-person-fill"></i> {{auth()->user()->username}}
           </button>
           <ul class="dropdown-menu">
             <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-layout-text-sidebar-reverse me-2"></i>My Dashboard</a></li>
             <li><hr class="dropdown-divider"></li>
             <li>
              <form action="/logout" method="post">
                {{-- CSRF Token --}}
                @csrf
                <button type="submit" class="dropdown-item" ><i class="bi bi-box-arrow-right me-2"></i>Logout</button>
              </form>
             </li>
           </ul>
         </div>
        @else
        {{-- @guest --}}
          <div class="my-1">
           <a href="/login" type="button" class="btn btn-outline-light"><i class="bi bi-box-arrow-in-right me-2"></i></i>Login</a>
          </div>
        {{-- @endguest --}}
        @endauth
        </ul>
    </div>
</nav>