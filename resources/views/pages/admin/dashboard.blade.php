  @extends('layouts.admin')

  @section('title')
      Store Admin Dashboard
  @endsection

  @section('content')
  <!-- Page Content -->
  <div id="page-content-wrapper">
    <nav
      class="navbar navbar-expand-lg navbar-light navbar-store fixed-top"
      data-aos="fade-down"
    >
      <div class="container-fluid">
        <button
          class="btn btn-secondary d-md-none me-auto me-2"
          id="menu-toggle"
        >
          &laquo; Menu
        </button>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Dekstop Menu -->
          <ul class="navbar-nav d-none d-lg-flex ms-auto">
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
                <a href="{{ route('home') }}" class="dropdown-item">Home</a>
                <a href="{{ route('logout') }}" 
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                   class="dropdown-item">Logout</a>
              </div>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
              </form>
            </li>
          </ul>
          <!-- mobile version -->
          <ul class="navbar-nav d-block d-lg-none">
            <li class="nav-item">
              <a href="#" class="nav-link"> Hi, {{ Auth::user()->name }} </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link d-inline-block"> Cart </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Section Content -->
    <div
      class="section-content section-dashboard-home"
      data-aos="fade-up"
    >
      <div class="container-fluid">
        <div class="dashboard-heading">
          <h2 class="dashboard-title">Admin Dashboard</h2>
          <p class="dashboard-subtitle">This is BWAStore Administrator Panel</p>
        </div>
        <div class="dashboard-content">
          <div class="row">
            <div class="col-md-4">
              <div class="card mb-2">
                <div class="card-body">
                  <div class="dashboard-card-title">Customer</div>
                  <div class="dashboard-card-subtitle">{{ $customer }}</div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-2">
                <div class="card-body">
                  <div class="dashboard-card-title">Revenue</div>
                  <div class="dashboard-card-subtitle">${{ $revenue }}</div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-2">
                <div class="card-body">
                  <div class="dashboard-card-title">Transaction</div>
                  <div class="dashboard-card-subtitle">{{ $transaction }}</div>
                </div>
              </div>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-12 mt-2">
              <h5 class="mb-3">Recent Transactions</h5>
              <a
                href="/dashboard-transactions-details.html"
                class="card card-list d-block"
              >
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-1">
                      <img
                        src="/images/dashboard-card-icon-1.png"
                        alt=""
                      />
                    </div>
                    <div class="col-md-4">Shirup Marzzan</div>
                    <div class="col-md-3">Muhammad Robi Rahman</div>
                    <div class="col-md-3">12 Januari, 2023</div>
                    <div class="col-md-1 d-none d-md-block">
                      <img
                        src="/images/dashboard-arrow-right.svg"
                        alt=""
                      />
                    </div>
                  </div>
                </div>
              </a>
              <a
                href="/dashboard-transactions-details.html"
                class="card card-list d-block"
              >
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-1">
                      <img
                        src="/images/dashboard-card-icon-2.png"
                        alt=""
                      />
                    </div>
                    <div class="col-md-4">LeBrone X</div>
                    <div class="col-md-3">Marcus Rashford</div>
                    <div class="col-md-3">11 January, 2023</div>
                    <div class="col-md-1 d-none d-md-block">
                      <img
                        src="/images/dashboard-arrow-right.svg"
                        alt=""
                      />
                    </div>
                  </div>
                </div>
              </a>
              <a
                href="/dashboard-transactions-details.html"
                class="card card-list d-block"
              >
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-1">
                      <img
                        src="/images/dashboard-card-icon-3.png"
                        alt=""
                      />
                    </div>
                    <div class="col-md-4">Soffa Lembutte</div>
                    <div class="col-md-3">Alejandro Garnacho</div>
                    <div class="col-md-3">14 Januari, 2023</div>
                    <div class="col-md-1 d-none d-md-block">
                      <img
                        src="/images/dashboard-arrow-right.svg"
                        alt=""
                      />
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection
  