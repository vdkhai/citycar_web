<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color: #090066 !important; position: sticky; top: 0; z-index: 999;">
    <!-- Container wrapper -->
    <div class="container-fluid">
      <div>
        <!-- Toggle button -->
        <button class="navbar-toggler"
                type="button"
                data-mdb-toggle="collapse"
                data-mdb-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation"
              >
          <i class="fas fa-bars" style="color: white; font-weight:bold;"></i>
        </button>

        <a href="{{ url('/') }}">
          <img src="{{ Storage::url('logo/citicar.jpeg') }}" height="50px" width="auto" alt="" loading="lazy" />
        </a>
      </div>
  
      <!-- Collapsible wrapper -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Navbar brand -->
        
        <!-- Left links -->
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="#" style="color: white; font-weight:bold;">Buy Car</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" style="color: white; font-weight:bold;">Sell Car</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" style="color: white; font-weight:bold;">About Citicar</a>
          </li>
        </ul>
        <!-- Left links -->
      </div>
      <!-- Collapsible wrapper -->
  
      <!-- Right elements -->
      <div class="d-flex align-items-center">
        @guest
          @if (Route::has('login'))
            <a class="nav-link" href="{{ route('login') }}" style="color: white; font-weight:bold;">{{ __('Login') }}</a>
          @endif

          @if (Route::has('register'))
            <a class="nav-link" href="{{ route('register') }}" style="color: white; font-weight:bold;">{{ __('Sign Up') }}</a>
          @endif
        @else
          @if (Auth::user()['is_admin'])
            <a id="navbarDropdown" class="nav-link" href="{{ route('admin.index') }}" role="button" aria-haspopup="true" aria-expanded="false" v-pre style="color: white; font-weight:bold;">
                Admin
            </a>
          @endif
    
          <!-- Avatar -->
          <a class="dropdown-toggle d-flex align-items-center hidden-arrow"
              href="#"
              id="navbarDropdownMenuLink"
              role="button"
              data-mdb-toggle="dropdown"
              aria-expanded="false"
            >
            <img src="https://mdbootstrap.com/img/new/avatars/2.jpg"
                  class="rounded-circle"
                  height="25"
                  alt=""
                  loading="lazy"
                />
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
            <li>
              {{--  <a class="dropdown-item" href="{{ route('profile.index') }}">My profile</a>  --}}
              <a class="dropdown-item" href="{{ route('profile.index') }}">Change Password</a>
            </li>
            {{--  <li>
              <a class="dropdown-item" href="#">Settings</a>
            </li>  --}}
            <li>
              <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
              </form>
            </li>
          </ul>
        @endguest
      </div>
      <!-- Right elements -->
    </div>
    <!-- Container wrapper -->
  </nav>
  <!-- Navbar -->