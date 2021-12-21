<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>@yield('title')</title>

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="../../css/product.css" rel="stylesheet">
  </head>

  <body>

  <header class="p-3 bg-secondary text-white">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="/" class="nav-link px-2 text-dark">Home</a></li>
          <li><a href="{{route('products')}}" class="nav-link px-2 text-white">Products</a></li>
          <li><a href="#" class="nav-link px-2 text-white">Ordering</a></li>
          <li><a href="#" class="nav-link px-2 text-white">Delivery</a></li>
          <li><a href="#" class="nav-link px-2 text-white">Help</a></li>
        </ul>

        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
          <input type="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">
        </form>

        @auth

        <div class="dropdown text-end">
          <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
          </a>
          <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1" style="">
            <li><a href="/profile" class="dropdown-item">Profile</a></li>
            <li><a href="" class="dropdown-item">Orders</a></li>
            <li><a href="" class="dropdown-item">Wishlist</a></li>
            <li><a href="" class="dropdown-item">Settings</a></li>
            <li><hr class="dropdown-divider"></li>
            <li>
              <form method="POST" action="{{ route('logout') }}">
              @csrf

              <x-button-drop-down-item :href="route('logout')"
                  onclick="event.preventDefault();
                      this.closest('form').submit();">
                          {{ __('Log Out') }}
              </x-button-drop-down-item>
              </form>
            </li>
          </ul>
        </div>

        @endauth
        @guest
        <div class="text-end">
          <a href="/login" class="btn btn-outline-light me-2">Login</a>
          <a href="/register" class="btn btn-warning">Sign-up</a>
        </div>
        @endguest

        <a href="{{route('cart.index')}}" class="btn position-relative">
          <img class="" src="{{Storage::url('public/staff/cart.png')}}" alt="Cart">
          @if(App\Models\Cart::checkUserCart())
            <span class="position-absolute top-0 start-80 translate-middle badge rounded-pill bg-danger">
              {{App\Models\Cart::getUserCartCount()}}
            </span>
          @endif
        </a>
      </div>
    </div>
    
  </header>
    <div class="container">
    @if(session()->has('success'))
      <div class="alert alert-success">
          {{ session()->get('success') }}
      </div>
    @endif
    </div>
    @yield('content')

    <div class="container">
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top fixed-bottom">
            <div class="col-md-4 d-flex align-items-center">
            <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
                <svg class="bi" width="30" height="24"><use xlink:href="#bootstrap"></use></svg>
            </a>
            <span class="text-muted">© 2021 Company, Inc</span>
            </div>

            <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
            <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#twitter"></use></svg></a></li>
            <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#instagram"></use></svg></a></li>
            <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#facebook"></use></svg></a></li>
            </ul>
        </footer>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="/js/amount.js"></script>

  </body>
</html>
