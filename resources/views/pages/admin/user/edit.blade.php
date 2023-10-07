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
        <p class="dashboard-subtitle">Edit User</p>
      </div>
      <div class="dashboard-content">
        <div class="row">
          <div class="col-md-12">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card">
              <div class="card-body">
                <form action="{{ route('user.update', $item->id) }}" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="row">
                      <div class="col-md-12">
                          <div class="mt-3">
                              <label class="form-label">Nama User</label>
                              <input
                                  type="text"
                                  name="name"
                                  class="form-control"
                                  placeholder="Enter your user name"
                                  value="{{ $item->name }}"
                                  required
                              />
                          </div>
                      </div>
                      <div class="col-md-12">
                          <div class="mt-3">
                              <label class="form-label">Email User</label>
                              <input
                                  type="email"
                                  name="email"
                                  class="form-control"
                                  placeholder="Enter your email"
                                  value="{{ $item->email }}"
                                  required
                              />
                          </div>
                      </div>
                      <div class="col-md-12">
                          <div class="mt-3">
                              <label class="form-label">Password User</label>
                              <input
                                  type="password"
                                  name="password"
                                  class="form-control"
                                  placeholder="Enter your user correct password"
                              />
                              <small>Kosongkan jika tidak ingin mengganti password</small>
                          </div>
                      </div>
                      <div class="col-md-12">
                          <div class="mt-3">
                              <label class="form-label">Roles</label>
                              <select name="roles" class="form-control" required>
                                <option value="{{ $item->roles }}" selected>Tidak diganti</option>
                                <option value="ADMIN">Admin</option>
                                <option value="USER">User</option>
                              </select>
                          </div>
                      </div>
                    </div>
                    <div class="row">
                        <div class="col text-end mt-3">
                            <button type="submit" class="btn btn-success px-5">
                                Save Now
                            </button>
                        </div>
                    </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection