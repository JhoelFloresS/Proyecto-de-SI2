<nav class="navbar navbar-expand-md">
    <div class="container-fluid mx-2">
      <div class="navbar-header">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#toggle-navbar" aria-controls="toggle-navbar" aria-expanded="false" aria-label="Toggle navigation">
          <i class="uil-bars text-white"></i>
        </button>
        <a class="navbar-brand" href="#">admin<span class="main-color">kit</span></a>
      </div>
      <div class="collapse navbar-collapse" id="toggle-navbar">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Settings
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li>
                <a class="dropdown-item" href="#">My account</a>
              </li>
              <li><a class="dropdown-item" href="#">My inbox</a>
              </li>
              <li><a class="dropdown-item" href="#">Help</a>
              </li>
              <li><hr class="dropdown-divider"></li>
              <form action="{{route('tenant.logout', tenant('id'))}}" method="post">
                @csrf
                <li><button type="submit" class="dropdown-item">Logout</button></li>
              </form>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="uil-comments-alt"></i><span>23</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="uil-bell"></i><span>98</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i data-show="show-side-navigation1" class="uil-bars show-side-btn"></i>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>