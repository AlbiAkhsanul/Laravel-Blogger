<div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
    <div class="offcanvas-lg offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="sidebarMenuLabel">COBA Blog</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
        <ul class="nav nav-pills flex-column">
          <li class="nav-item">
            <a href="/home" class="nav-link text-black" aria-current="page">
              <i class="bi bi-house-fill me-2"></i>
              Home
            </a>
          </li>
          <li>
            <a href="/dashboard" class="nav-link {{ Request::is('dashboard') ? '' : 'text-black' }}">
              <i class="bi bi-border-style me-2"></i>
              Dashboard
            </a>
          </li>
          <li>
            <a href="/dashboard/posts" class="nav-link {{ Request::is('dashboard/posts*') ? '' : 'text-black' }}">
              <i class="bi bi-file-earmark-fill me-2"></i>
              My Posts
            </a>
          </li>
        </ul>

        @can('admin')
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>ADMINISTRATOR</span>
        </h6>
        <ul class="nav nav-pills flex-column">
          <li>
            <a href="/dashboard/categories" class="nav-link {{ Request::is('dashboard/categories*') ? '' : 'text-black' }}">
              <i class="bi bi-tags-fill me-2"></i>
              Post Categories
            </a>
          </li>
        </ul>
        @endcan

        <hr>

        <div class="dropdown ms-3 mb-3">
          <a href="#" class="d-flex align-items-center link-body-emphasis text-decoration-none dropdown-toggle"data-bs-toggle="dropdown" aria-expanded="false">
            <img src="http://source.unsplash.com/600x600?selfie-potrait" alt="" width="32" height="32" class="rounded-circle me-2">
            <strong>{{auth()->user()->username}}</strong>
          </a>
          <ul class="dropdown-menu text-small shadow">
            <li><a class="dropdown-item" href="#"><i class="bi bi-gear me-1"></i>Settings</a></li>
            <li><a class="dropdown-item" href="#"><i class="bi bi-person-circle me-1"></i>Profile</a></li>
            <li><hr class="dropdown-divider"></li>
            <li>
              <form action="/logout" method="post">
              @csrf
              <button type="submit" class="dropdown-item d-flex text-black" onclick="return confirm('Apakah anda yakin ingin logout?')"><i class="bi bi-door-closed me-1"></i>Logout</button>
            </form></li>
          </ul>
        </div>
      </div>
    </div>
</div>