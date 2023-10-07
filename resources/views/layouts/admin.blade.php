<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>@yield('title')</title>

     @stack('prepend-style')
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link href="/style/main.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.css" rel="stylesheet"/>
    @stack('addon-style')
  </head>
  <body>
    <div class="page-dashboard">
      <div class="d-flex" id="wrapper" data-aos="fade-right">
        <!-- Sidebar -->
        <div class="border-right" id="sidebar-wrapper">
          <div class="sidebar-heading text-center">
            <img
              src="/images/admin-logo.jpg"
              alt="dashboard-store-logo"
              class="my-4"
              style="width: 100px; height:100px; border-radius: 50%"
            />
          </div>
          <ul class="list-group list-group-flush">
            <a
              href="{{ route('admin-dashboard') }}"
              class="list-group-item list-group-item-action {{ (request()->is('admin')) ? 'active' : '' }}"
            >
              Dashboard
            </a>
            <a
              href="{{ route('product.index') }}"
              class="list-group-item list-group-item-action {{ (request()->is('admin/product')) ? 'active' : '' }}"
            >
              Products
            </a>
            <a
              href="{{ route('product-gallery.index') }}"
              class="list-group-item list-group-item-action {{ (request()->is('admin/product-gallery*')) ? 'active' : '' }}"
            >
              Galleries
            </a>
            <a
              href="{{ route('category.index') }}"
              class="list-group-item list-group-item-action {{ (request()->is('admin/category*')) ? 'active' : '' }}"
            >
              Categories
            </a>
            <a
              href="{{ route('dashboard-transaction') }}"
              class="list-group-item list-group-item-action"
            >
              Transactions
            </a>
            <a
              href="{{ route('user.index') }}"
              class="list-group-item list-group-item-action  {{ (request()->is('admin/user*')) ? 'active' : '' }}"
            >
              Users
            </a>
            <a
              href="{{ route('logout') }}"
              onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
              class="list-group-item list-group-item-action"
            >
              Sign Out
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
          </ul>
        </div>
        
        {{-- content --}}
        @yield('content')
      </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    @stack('prepend-script')
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
    <script>
      $("#menu-toggle").click(function (e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
      });
    </script>
     @stack('addon-script')
  </body>
</html>
