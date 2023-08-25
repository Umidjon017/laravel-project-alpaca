<nav class="navbar">
  <a href="#" class="sidebar-toggler">
    <i data-feather="menu"></i>
  </a>
  <div class="navbar-content">
    <form class="search-form">
      <div class="input-group">
        <div class="input-group-text">
          <i data-feather="search"></i>
        </div>
        <input type="text" class="form-control" id="navbarForm" placeholder="Search here...">
      </div>
    </form>
    <ul class="navbar-nav">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="languageDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="ms-1 me-1 d-none d-md-inline-block"> {{__('Languages')}} </span>
        </a>
        <div class="dropdown-menu" aria-labelledby="languageDropdown">
            @foreach(\Illuminate\Support\Facades\Cache::get('localizations') as $locale)
                <a href="/locale/{{ $locale->id }}" class="dropdown-item py-2">
                    <img src="{{ url('assets/images/flags/ru.svg') }}" class="wd-20 me-1" title="us" alt="us"> <span class="ms-1"> {{ $locale->name }} </span>
                </a>
            @endforeach
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img class="wd-30 ht-30 rounded-circle" src="{{ url('https://via.placeholder.com/30x30') }}" alt="profile">
        </a>
        <div class="dropdown-menu p-0" aria-labelledby="profileDropdown">
          <ul class="list-unstyled p-1">
            <li class="dropdown-item py-2">
              <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn text-body ms-0 p-0">
                  <i class="me-2 icon-md" data-feather="log-out"></i>
                  <span>Log Out</span>
                </button>
              </form>
            </li>
          </ul>
        </div>
      </li>
    </ul>
  </div>
</nav>
