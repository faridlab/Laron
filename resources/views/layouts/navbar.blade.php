<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top flex-md-nowrap shadow">
  <span class="navbar-brand mb-0 h1 col-md-2">{{ config('app.name', 'Laron') }}</span>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
    </form>
    <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          <span data-feather="settings"></span>
        </a>
        <div class="dropdown-menu shadow" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
    </ul>

    <ul class="navbar-nav mr-sm-2">
      <li class="nav-item">
        <a class="nav-link" href="#"><span data-feather="mail"></span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><span data-feather="bell"></span></a>
      </li>
      <li class="nav-item active dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbar-dropdown-profile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Faridlab
        </a>
        <div class="dropdown-menu dropdown-menu-right shadow" aria-labelledby="navbar-dropdown-profile">
          <a class="dropdown-item" href="#">Profile</a>
          <a class="dropdown-item" href="#">Settings</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item text-danger" text-danger href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                <i class="ft-power"></i> {{ __('Logout') }}</a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
        </div>
      </li>
    </ul>
  </div>
</nav>
