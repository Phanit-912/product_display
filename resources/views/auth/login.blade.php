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

  <div class="layout_width layout_height">
    <div class="d-flex justify-content-center bg-success bg-gradient layout_width layout_height align-items-center">

      <div class="login_form bg-white p-4 rounded border border-success shadow">

        <div class="d-flex justify-content-center">
          {{-- <h1><i class="bi text-danger bi-columns-gap"></i></h1> --}}
          <h1 class="m-0 pb-2"><i class="bi text-danger bi-cash-coin"></i></h1>
        </div>
        <div class="d-flex justify-content-center">
          <h4 class="m-0 p-0">{{ __('Login') }}</h4>
        </div>

        <div class="w-100">

          <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="input-field mx-2">
              <input id="username" type="text" class="validate" name="username" value="{{ old('username') }}" required>
              <label for="username">{{ __('Username') }}</label>

                @error('username')
                  <span class="helper-text text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="input-field mx-2 mt-4">
              <input id="password" type="password" class="validate" name="password" value="{{ old('password') }}" required>
              <label for="password">{{ __('Password') }}</label>

                @error('password')
                  <span class="helper-text text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="d-flex justify-content-between mb-4">

              <div class="w-100">
              </div>

              <div class="mx-2"></div>

              <div class="w-100 text-end mx-2" style="cursor: pointer;" id="seepass">
                <p class="p-0 m-0" id="btn_title" style="color: #0088cc;">Show Password</p>
              </div>

            </div>

            <div class="d-flex justify-content-between">
              <button class="w-100 btn waves-effect waves-light white-text" type="submit" name="action">{{ __('Login') }}</button>
            </div>

          </form>

        </div>

      </div>

    </div>
  </div>

  <script>
    let btn = document.querySelector('#seepass');
    let btn_title = document.querySelector('#btn_title');
    let input = document.querySelector('#password');

    btn.addEventListener('click',()=> {
        if ( input.type === "password") {
            input.type = "text";
            btn_title.innerHTML = "Hide Password";
            btn_title.style.color = "#ff0000";
        } else {
            input.type = "password"
            btn_title.innerHTML = "Show Password";
            btn_title.style.color = "#0088cc";
        }
    })
  </script>

</body>
</html>