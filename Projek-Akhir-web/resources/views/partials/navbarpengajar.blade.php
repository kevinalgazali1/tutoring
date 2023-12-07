<nav class="navbar" style="background-color: #BBAB8C; position: sticky; top: 0; z-index: 1000;">
  <div class="container-fluid">

    <a class="navbar-brand text-white" href="#"></a>
    {{-- <img src="img/logo.png" alt="Logo" class="logo-img"> --}}
    <a class="navbar-brand text-white" href="#"></a>

    <form class="d-flex mt-4 ms-auto" action="{{ route('pengajar.search') }}" method="GET" role="search" style="margin: 16px;">
      <input class="form-control me-2" type="search" name="nama" placeholder="Search" aria-label="Search">
      <button class="btn btn-secondary" type="submit">Search</button>
  </form>

    <button class="navbar-toggler navbar-toggler-light" type="button" data-bs-toggle="offcanvas"
      data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
      aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Website Tutoring</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('pengajar') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('pengajar.profile') }}">User Profile</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
              aria-expanded="false">
              Menu
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{ route('course.index') }}">Course Management</a></li>
              <li><a class="dropdown-item" href="{{ route('content.index') }}">Content Management</a></li>
            </ul>

            <li class="nav-item active">
                <a class="nav-link" onclick="document.getElementById('logout-form').submit()" href="#">
                    <i class="fas fa-logout fa-fw"></i>
                    <span>Logout</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="post">
                    @csrf
                </form>
            </li>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>
