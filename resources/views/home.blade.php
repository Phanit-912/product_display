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
      <p class="m-0 p-2 fs-4 fw-semibold text-uppercase text-danger">ONE DISPLAY <span class="fs-6" id="event"></span></p>
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
      <h5>Profile</h5>
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

      {{-- Modal Product Detail --}}
        <div id="modalProduct_Grid" class="modal modalProduct">
          <div class="modal-content">
            <p>Hello This is modal detail!!</p>
          </div>
          <div class="modal-footer">
            <a href="#" class="modal-close waves-effect waves-green btn-flat">Agree</a>
          </div>
        </div>
      {{-- End Modal Product Detail --}}

      <div class="product_card bg-white m-3 rounded-4 shadow modal-trigger" data-target="modalProduct_Grid">
        <div class="rounded-4 product_image">
          <img src="https://img.freepik.com/premium-vector/cute-robot-cyborg-modern-robotic-character-artificial-intelligence-technology-concept-vector-illustration_48369-42931.jpg?w=826" class="w-100 product_image rounded-4" alt="">
        </div>
        <div class="product_title">
          <p class="m-0 p-0 product_price"><span class="rounded-top px-1 pb-2 bg-white">$ 9999.00</span></p>
          <p class="m-0 p-2 text-secondary">Product Name Product Name Product Name Product Name Product NameProduct NameProduct Name</p>
        </div>
      </div>


      <script>

        for (let index = 0; index < 49; index++) {
          document.write('<div class="product_card bg-white m-3 rounded-4  shadow modal-trigger" data-target="modalProduct_Grid">');

            document.write('<div class="rounded-4 product_image">');
              document.write('<img src="https://img.freepik.com/free-vector/cute-dog-robot-cartoon-character-animal-technology-isolated_138676-3143.jpg?w=826&t=st=1676619039~exp=1676619639~hmac=c432b4adac064d5eca8797148c0265248b8446bec731fdd7061f036fd62d17e9" class="w-100 product_image rounded-4" alt="">');
            document.write('</div>');
            
            document.write('<div class="product_title">');
            document.write('<p class="m-0 p-0 product_price"><span class="rounded-top px-1 pb-2 bg-white">$ 9999.00</span></p>');
            document.write('<p class="m-0 p-2 text-secondary">Hikvision SSD 128G Warranty 2 Years '+ '- N.' + index +'</p>');
            document.write('</div>');
          document.write('</div>');
        }

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