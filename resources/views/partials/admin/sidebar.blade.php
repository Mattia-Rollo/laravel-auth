<div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark" style="width: 280px;">
  <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
    <i class="fs-3 fa-solid fa-toolbox"></i>
    <span class="ms-3 fs-4">Sidebar</span>
  </a>
  <hr>
  <ul class="nav nav-pills flex-column mb-auto ">
    <li class="nav-item">
      <a href="{{url('/')}}" class="nav-link text-white{{ Route::currentRouteName() == 'welcome' ? 'active' : '' }} ">
        <i class="fa-solid fa-house me-1"></i>
        Home
      </a>
    </li>
    <li>
      <a href="{{route('admin.projects.index')}}"  class="nav-link text-white {{ Route::currentRouteName() == 'admin.projects.index' ? 'active' : '' }} ">
        <i class="fa-solid fa-gauge me-1"></i>
        {{-- <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#speedometer2">
          <svg id="speedometer2" fill="#EF3B2D" viewBox="0 0 16 16">
            <path d="M8 4a.5.5 0 0 1 .5.5V6a.5.5 0 0 1-1 0V4.5A.5.5 0 0 1 8 4zM3.732 5.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707zM2 10a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 10zm9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5zm.754-4.246a.389.389 0 0 0-.527-.02L7.547 9.31a.91.91 0 1 0 1.302 1.258l3.434-4.297a.389.389 0 0 0-.029-.518z"></path>
            <path fill-rule="evenodd" d="M0 10a8 8 0 1 1 15.547 2.661c-.442 1.253-1.845 1.602-2.932 1.25C11.309 13.488 9.475 13 8 13c-1.474 0-3.31.488-4.615.911-1.087.352-2.49.003-2.932-1.25A7.988 7.988 0 0 1 0 10zm8-7a7 7 0 0 0-6.603 9.329c.203.575.923.876 1.68.63C4.397 12.533 6.358 12 8 12s3.604.532 4.923.96c.757.245 1.477-.056 1.68-.631A7 7 0 0 0 8 3z"></path>
          </svg>  
        </use></svg> --}}
        <span>Dashboard</span>
      </a>
    </li>
    <li>
      <a href="#" class="nav-link text-white">
        <i class="fa-solid fa-cash-register me-1"></i>
        Orders
      </a>
    </li>
    <li>
      <a href="#" class="nav-link text-white">
        <i class="fa-solid fa-sitemap me-1"></i>
        Products
      </a>
    </li>
  </ul>
  <hr>
  <div class="dropdown">
    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
      <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
      <strong>{{Auth::user()->name}}</strong>
    </a>
    <ul class="dropdown-menu dropdown-menu-dark text-small shadow" style="">
      <li><a class="dropdown-item" href="{{route('admin.projects.create')}}">New project...</a></li>
      <li><a class="dropdown-item" href="#">Settings</a></li>
      <li><a class="dropdown-item" href="#">Profile</a></li>
      <li><hr class="dropdown-divider"></li>
      <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
    </ul>
  </div>
</div>