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

  
  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-secondary">
      <div class="container-fluid">

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a href="/" class="nav-link px-2 text-dark">Home</a>
            </li>
            <li class="nav-item dropdown">
              <a href="#" class="nav-link px-2 text-white" id="dropdownProducts" role="button" data-bs-toggle="dropdown" aria-expanded="false">Products</a>
              <ul class="dropdown-menu text-small" aria-labelledby="dropdownProducts">
                @foreach($categoriesList as $category)
                  <li><a href="/products?category={{$category->id}}" class="dropdown-item">{{$category->category}}</a></li>
                @endforeach
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link px-2 text-white">Ordering</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link px-2 text-white">Delivery</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link px-2 text-white">Help</a>
            </li>
          </ul>
        </div>

        @auth
          <div class="btn-group">
              <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false" data-display="static">
                <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
              </a>
              <ul class="dropdown-menu dropdown-menu-end text-small" aria-labelledby="dropdownUser1">
                <li><a href="/profile" class="dropdown-item">Profile</a></li>
                <li><a href="/profile/orders" class="dropdown-item">Orders</a></li>
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
            <div class="">
              <a href="/login" class="m-1 btn btn-warning">Login</a>
            </div>
            @endguest
      </div>

</header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <form class="d-flex navbar-nav align-content-start w-50 mx-auto">
          <input class="form-control" type="search" placeholder="Search" aria-label="Search">
        </form>

        <a href="{{route('cart.index')}}" class="btn position-relative mt-2">
          <img class="" src="{{Storage::url('public/staff/cart.png')}}" alt="Cart">
            @if(App\Models\Cart::checkUserCart())
              <span class="position-absolute top-0 start-80 translate-middle badge rounded-pill bg-danger">
                {{App\Models\Cart::getUserCartCount()}}
              </span>
            @endif
        </a>
      </div>
    </nav> 

    <div class="container">
    @if(session()->has('success'))
      <div class="alert alert-success">
          {{ session()->get('success') }}
      </div>
    @endif
    </div>
    @yield('content')


    <footer class="d-flex flex-wrap mt-auto justify-content-between align-items-center py-3 my-4 border-top">
      <div class="container ">
        <div class="col-md-4 d-flex align-items-center">
          <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
              <svg class="bi" width="30" height="24"><use xlink:href="#bootstrap"></use></svg>
          </a>
          <span class="text-muted">© 2021 Company, Inc</span>
        </div>

      </div>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="/js/amount.js"></script>

  </body>
</html>
