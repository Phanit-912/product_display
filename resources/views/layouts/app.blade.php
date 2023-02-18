<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }} {{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }}</title>

    <style>
      textarea:focus,
      textarea.form-control:focus,
      select.form-select:focus, 
      input.form-control:focus, 
      input[type=text]:focus, 
      input[type=password]:focus, 
      input[type=email]:focus, 
      input[type=number]:focus, 
      [type=text].form-control:focus, 
      [type=password].form-control:focus, 
      [type=email].form-control:focus, 
      [type=tel].form-control:focus, 
      [contenteditable].form-control:focus {
        box-shadow: inset 0 -1px 0 #ddd;
        border: 1px solid #0088cc
      }

      /* ===== Scrollbar CSS ===== */
      /* Firefox */
      * {
        scrollbar-width: thin;
        scrollbar-color: #2bbd7e #ffffff;
      }

      /* Chrome, Edge, and Safari */
      *::-webkit-scrollbar {
        width: 6px;
        height: 5px;
      }

      *::-webkit-scrollbar-track {
        background: #ffffff;
      }

      *::-webkit-scrollbar-thumb {
        background-color: #2bbd7e;
        border-radius: 8px;
        border: 1px solid #ffffff;
      }
    </style>

    <link rel="stylesheet" href="{{ url('custom_css/app.css') }}">

    {{-- Boostrap --}}
    <link href="{{ url('bootstrap5.2/css/bootstrap.min.css') }}" rel="stylesheet">
    <script src="{{ url('bootstrap5.2/js/bootstrap.bundle.min.js') }}"></script>

    {{-- Icon --}}
    <link rel="stylesheet" href="{{ url('bootstrapicons/bootstrap-icons.css') }}">

    {{-- Materialize --}}
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="{{ url('materialize/css/materialize.min.css') }}">
    <!-- Compiled and minified JavaScript -->
    <script src="{{ url('materialize/js/materialize.min.js') }}"></script> 

    
    <!--search ajax-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>
<body>

  <div class="layout_width layout_height bg-white">
    <div class="w-100 layout_height d-flex justify-content-between">

      {{-- Nav View --}}
      <div class="nav_box bg-light layout_height shadow overflow-auto" style="z-index: 9999999999">

        @can('product_view')
        <a href="{{ route('products.index') }}">
          <button class="transparent border-0 rounded-0 w-100 pt-2 pb-2 bg-transparent waves-effect waves-green">              
              <h2 class="m-0 green-text text-darken-2"><i class="bi fs-1 bi-shop-window"></i></h2>
              <p class="m-0 green-text text-darken-2 nav_font">Product</p>
          </button>
        </a>
        @endcan

        @can('product_view')
        <a href="{{ route('products.index') }}">
          <button class="transparent border-0 rounded-0 w-100 pt-2 pb-2 bg-transparent waves-effect waves-green">              
              <h2 class="m-0 green-text text-darken-2"><i class="bi fs-1 bi-x-diamond"></i></h2>
              <p class="m-0 green-text text-darken-2 nav_font">Category</p>
          </button>
        </a>
        @endcan

        @can('user_view')
        <a href="{{ route('users.index') }}">
          <button class="transparent border-0 rounded-0 w-100 pt-2 pb-2 bg-transparent waves-effect waves-green">              
              <h2 class="m-0 green-text text-darken-2"><i class="bi bi-people"></i></h2>
              <p class="m-0 green-text text-darken-2 nav_font">Users</p>
          </button>
        </a>
        @endcan

        @can('role_view')
        <a href="{{ route('roles.index') }}">
          <button class="transparent border-0 rounded-0 w-100 pt-2 pb-2 bg-transparent waves-effect waves-green">              
              <h2 class="m-0 green-text text-darken-2"><i class="bi bi-diagram-2"></i></h2>
              <p class="m-0 green-text text-darken-2 nav_font">Roles</p>
          </button>
        </a>
        @endcan
        
        @can('user_view')
        <a>
          <button class="transparent border-0 rounded-0 w-100 pt-2 pb-2 waves-effect waves-green">
              <h2 class="m-0 green-text text-darken-2"><i class="bi bi-person"></i></h2>
              <p class="m-0 green-text text-darken-2 nav_font text-truncate">User</p>
          </button>
        </a>
        @endcan

        <a href="#">
          <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="transparent border-0 rounded-0 w-100 pt-2 pb-2 waves-effect waves-green">
                <h3 class="m-0 green-text text-darken-2"><i class="bi bi-box-arrow-left"></i></h3>
                <p class="m-0 green-text text-darken-2 nav_font">{{ __('Logout') }}</p>
            </button>
          </form>
        </a>

      </div>

      {{-- Content View --}}
      <div class="w-100 layout_height overflow-auto">

          @yield('content')

      </div>
                              
    </div>
  </div>  

</body>
</html>