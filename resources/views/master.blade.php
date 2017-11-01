<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>@yield('title', 'Laravel Shopping Cart')</title>
    <link rel="icon"  href="{{ asset('img/LOGO.png') }} type="image/x-icon">
    <meta name="description" content="Laravel Shopping Cart">

    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Store CSRF token for AJAX calls -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Stylesheets -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}"></script>
    <script>new WOW().init();</script>

    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>


    @yield('extra-css')

    <!-- Favicon and Apple Icons -->
    <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}">


    <style>
        a{
            color:orange;
        }

        .logo{
            margin-top: -27;
        }

        .spacer {
            margin-bottom: 100px;
        }

        .cart-image {
            width: 100px;
        }

        footer {
            background-color: #f5f5f5;
            padding: 20px 0;
        }

        .table>tbody>tr>td {
            vertical-align: middle;
        }

        .side-by-side {
            display: inline-block;
        }
    </style>
</head>
<body>

    <header>

        <nav class="navbar sticky-top navbar-dark mdb-color darken-3">
          <div class="container fixed-top">
            <div class="navbar-header ">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>

              <a class="navbar-brand pull-left"  href="{{ url('/') }}">
                  <img src="{{ asset('img/LOGO.png') }} " alt="product" class="logo pull-left d-inline-block align-top" width="70" height="75">
                  Laravel Shopping Cart</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">

              <ul class="nav navbar-nav navbar-right">
                <li class="{{ set_active('wishlist') }}"><a href="{{ url('/wishlist') }}">Wishlist ({{ Cart::instance('wishlist')->count(false) }})</a></li>
                <li class="{{ set_active('cart') }}"><a href="{{ url('/cart') }}">Cart ({{ Cart::instance('default')->count(false) }})</a></li>
              </ul>
            </div><!--/.nav-collapse -->
          </div>
        </nav>

    </header>

    @yield('content')

    <footer>
      <div class="container">
        <p class="text-muted">By: Pauline Maunes</p>
      </div>
    </footer>

<!-- JavaScript -->
@yield('extra-js')


    <script type="text/javascript">
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove();
            });
        }, 10000);
    </script>
</body>
</html>
