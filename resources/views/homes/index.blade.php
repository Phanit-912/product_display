<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }} {{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Khmer:wght@100;300;500;700&display=swap" rel="stylesheet">

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
    

    <style>
      * {
        margin: 0px;
        padding: 0px;
        font-family: 'Noto Sans Khmer', sans-serif;
      }

      textarea:focus, 
      textarea.form-control:focus, 
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
        scrollbar-width: auto;
        scrollbar-color: #2bbd7e #ffffff;
      }

      /* Chrome, Edge, and Safari */
      *::-webkit-scrollbar {
        width: 6px;
      }

      *::-webkit-scrollbar-track {
        background: #ffffff;
      }

      *::-webkit-scrollbar-thumb {
        background-color: #2bbd7e;
        border-radius: 10px;
        /* border: 1px solid #ffffff; */
      }

    </style>

</head>
<body>

  <div class="layout_width layout_height overflow-auto home_background" >

    {{-- Navigation Bar View --}}
    <div class="w-100 d-flex justify-content-between align-items-center bg-white sticky-top">
      <p class="m-0 px-4 py-1 fs-3 sidenav-trigger" data-target="slide-out">
        <i class="bi bi-text-indent-right"></i>
      </p>
      <p class="m-0 p-2 fs-4 fw-semibold text-uppercase text-danger" id="event">ONE DISPLAY</p>
      <p class="m-0 px-4 py-1 fs-3 modal-trigger" data-target="modalProduct_Cart">
        <i class="bi bi-basket3"></i>
      </p>
    </div>

     <!-- Modal Structure -->
      <div id="modalProduct_Cart" class="modal modalCart">
        <div class="modal-content">
          <h4>Modal Header</h4>
          <p>A bunch of text</p>
        </div>
        <div class="modal-footer">
          <a href="#" class="modal-close waves-effect waves-green btn-flat">Agree</a>
        </div>
      </div>
     <!-- End Modal Structure -->

    {{-- Side Nav --}}
    <div id="slide-out" class="sidenav">
      <div class="py-4"></div>
      
      <div class="p-3">
        <h5 class="text-danger">ONE DISPLAY</h5>

        <p class="py-2 border-bottom text-success">Category</p>
        @foreach ($categories as $category)
            <p class="sidenav-close"><a class="text-dark" href="#{{ $category->category_name }}_{{ $category->id }}">{{ $category->category_name }}</a></p>
        @endforeach

        <div class="py-4"></div>

        <p class="py-2 border-bottom text-success">Brand</p>
        @foreach ($brands as $brand)
            <p>{{ $brand->brand_name }}</p>
        @endforeach
      </div>

    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
          var elems = document.querySelectorAll('.sidenav');
          M.Sidenav.init(elems);
        });

       document.addEventListener('DOMContentLoaded', function() {
          var elems = document.querySelectorAll('.modalCart');
          M.Modal.init(elems);
        });
    </script>
    {{-- End Side Nav --}}
    {{-- End Navigation Bar View --}}
    

    {{-- Product View --}}
    <div class="w-100 d-flex justify-content-center flex-wrap align-content-start p-3" id="viewEvent">

      @foreach ($categories as $key => $category)
      <div class="pt-4"  id="{{ $category->category_name }}_{{ $category->id }}"></div>
        <div class="w-100 bg-white p-3 rounded border-bottom border-danger shadow">
          <p class="m-0 p-0">{{ $category->category_name }}</p>
        </div>

        @foreach ($products as $product)

          @if ($category->id == $product->product_category_id)
          
            {{-- Modal Product Detail --}}
              <div id="modalProduct_Grid{{ $product->id }}" class="modal modalProduct">
                <div class="modal-content">
                  
                  <div class="w-100 d-flex justify-content-center">
                    <img @if ($product['product_image'] != null)
                        src="{{ url( '/storage/' . $product['product_image']) }}"
                      @else
                        src="{{ url('image/no_image.jpg') }}"
                      @endif 
                      alt="image" class="rounded" style="width: 18em; height: 18em; object-fit: cover;">  
                  </div>

                  <p>{{ $product->product_name }}</p>
                  <p>{{ $product->product_general_price }}</p>
                  <p>{{ $product->product_wholesale_price }}</p>
                  <p>{{ $product->product_special_price }}</p>
                  <p>{{ $product->product_description }}</p>
                </div>
              </div>
            {{-- End Modal Product Detail --}}

            <div class="product_card bg-white m-3 rounded-4 shadow modal-trigger" data-target="modalProduct_Grid{{ $product->id }}">
              <div class="rounded-4 product_image">
                <img @if ($product['product_image'] != null)
                      src="{{ url( '/storage/' . $product['product_image']) }}"
                    @else
                      src="{{ url('image/no_image.jpg') }}"
                    @endif 
                    alt="image" class="w-100 product_image rounded-4">  
              </div>
              <div class="product_title">
                <p class="m-0 p-0 product_price"><span class="rounded-top px-1 pb-2 bg-white">$ {{ $product->product_general_price }}</span></p>
                <p class="m-0 p-2 text-secondary">{{ $product->product_name }}</p>
              </div>
            </div>

          @endif

        @endforeach
      
      @endforeach


      <script>        

        // For Modal Product
        document.addEventListener('DOMContentLoaded', function() {
          var elems = document.querySelectorAll('.modalProduct');
          M.Modal.init(elems);
        });

        // Get Event on display
        document.addEventListener('mousedown', viewEvent);
        document.addEventListener('mousemove', viewEvent);
        document.addEventListener('touchstart', viewEvent);
        document.addEventListener('scroll', viewEvent);
        document.addEventListener('keydown', viewEvent);

        function viewEvent(evt){
          document.getElementById('viewEvent').innerHTML;
          document.getElementById('event').innerHTML = evt.type;
        }
      </script>

    </div>

  </div>

</body>
</html>