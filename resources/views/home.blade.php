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

</head>
<body>

  <div class="layout_width layout_height bg-success">
    
  </div>

</body>
</html>