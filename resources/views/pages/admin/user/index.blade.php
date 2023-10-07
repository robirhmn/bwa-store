@extends('layouts.admin')

@section('title')
    User
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
        <h2 class="dashboard-title">User</h2>
        <p class="dashboard-subtitle">List of Users</p>
      </div>
      <div class="dashboard-content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-body">
                <a href="{{ route('user.create') }}" class="btn btn-primary mb-3">
                  + Tambah User Baru
                </a>
                <div class="table-responsive">
                  <table class="table table-hover scroll-horizontal-vertical w-100" id="crudTable">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Roles</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody></tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('addon-script')
    <script>
      var dataTable = $('#crudTable').DataTable({
        processing: true,
        serverSide: true,
        ordering: true,
        ajax: {
          url: '{!! url()->current() !!}', //diescape dan itu syntaxnya laravel
        },
        columns: [
          {data: 'id', name: 'id'},
          {data: 'name', name: 'name'},
          {data: 'email', name: 'email'},
          {data: 'roles', name: 'roles'},
          {
            data: 'action', 
            name: 'action',
            orderable: false,
            searcable: false,
            width: '15%'
          },
        ]
      });
    </script>
@endpush