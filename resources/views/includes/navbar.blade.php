   <nav
      class="navbar navbar-expand-lg navbar-light navbar-store fixed-top navbar-fixed-top"
      data-aos="fade-down"
    >
      <div class="container">
        <a href="{{ route('home') }}" class="navbar-brand">
          <img src="/images/logo.svg" alt="Logo" />
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarResponsive"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a href="{{ route('home') }}" class="nav-link active">Home</a>
            </li>
            <li class="nav-item">
              <a href="{{ route('categories') }}" class="nav-link">Categories</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">Rewards</a>
            </li>
            @guest
              <li class="nav-item">
                <a href="{{ route('register') }}" class="nav-link">Sign Up</a>
              </li>
              <li class="nav-item">
                <a href="{{ route('login') }}" class="btn btn-success px-4 text-white"
                  >Sign In</a
                >
              </li>
            @endguest
          </ul>
          @auth
            <ul class="navbar-nav d-none d-lg-flex">
              <li class="nav-item dropdown">
                <a
                  href="#"
                  class="nav-link"
                  id="navbarDropdown"
                  role="button"
                  data-bs-toggle="dropdown"
                >
                  <img
                    src="/images/user.png"
                    alt="user"
                    class="rounded-circle me-2 profile-picture"
                  />
                  Hi, {{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu">
                  @if (Auth::user()->roles == "ADMIN")
                    <a href="{{ route('admin-dashboard') }}" class="dropdown-item">Dashboard</a>
                  @else
                    <a href="{{ route('dashboard') }}" class="dropdown-item">Dashboard</a>
                  @endif
                  <a href="{{ route('dashboard-settings-account') }}" class="dropdown-item"
                    >Settings</a
                  >
                  <div class="dropdown-divider"></div>
                  <a href="{{ route('logout') }}"
                     onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item">
                     {{ __('Logout') }}
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                  </form>
                </div>
              </li>
              <li class="nav-item">
                <a href="{{ route('cart') }}" class="nav-link d-inline-block mt-2">
                  @php $carts = App\Models\Cart::where('users_id', Auth::user()->id)->count(); @endphp
                  @if ($carts > 0)
                    <img
                      src="/images/icon-cart-filled.svg"
                      alt="shopping-cart-filled"
                    />
                    <div class="card-badge">{{ $carts }}</div>
                  @else
                    <img
                      src="/images/icon-cart-filled.svg"
                      alt="shopping-cart-empty"
                    />
                  @endif
                </a>
              </li>
            </ul>
            <!-- mobile version -->
            <ul class="navbar-nav d-block d-lg-none">
              <li class="nav-item">
                <a href="#" class="nav-link"> Hi, {{ Auth::user()->name }} </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('cart') }}" class="nav-link d-inline-block"> Cart </a>
              </li>
            </ul>
          @endauth
        </div>
      </div>
    </nav>
