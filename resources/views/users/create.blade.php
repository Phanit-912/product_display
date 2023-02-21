@extends('layouts.app')


@section('content')
<div class="w-100">
  {{-- Header --}}
  @if (count($errors) > 0)
    <div class="alert alert-danger">
      <strong>Whoops!</strong> There were some problems with your input.<br><br>
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <div class="w-100 d-flex justify-content-between  align-items-center border-bottom">
    <div class="ms-3">
      <a href="{{ route('users.index') }}">
          <h5 class="m-0 blue-grey-text"><i class="bi bi-arrow-left-square"></i></h5>
      </a>
    </div>

    <div class="w-100 text-center">
      <h4 class="text-truncate mx-0 my-3">New User</h4>
    </div>

    <div class="text-end me-3">

      {{-- @can('user_create')
        <a href="{{ route('users.create') }}">
            <h5 class="m-0 green-text text-accent-4"><i class="bi bi-plus-square"></i></h5>
        </a>
      @endcan --}}

    </div>
  </div>
</div>

<div class="w-100 p-4 d-flex justify-content-center">
  <form action="{{ route('users.store') }}" method="POST" class="w-50">

    @csrf

    <div class="d-flex justify-content-between">

      <div class="w-100 input-field">
        <input id="input_text" type="text" id="name" name="name" value="{{ old('name') }}" autofocus>
        <label for="input_text">Name</label>
      </div>

      <div class="mx-2"></div>

      <div class="w-100 input-field">
        <input id="input_text" type="email" id="email" name="email" value="{{ old('email') }}">
        <label for="input_text">Email</label>
      </div>
      
    </div>

    <div class="d-flex justify-content-between">

      <div class="w-100 input-field">
        <input id="input_text" type="text" id="username" name="username" value="{{ old('username') }}">
        <label for="input_text">Username</label>
      </div>

      <div class="mx-2"></div>

      <div class="w-100 input-field">
        {!! Form::select('roles[]', $roles,['class'], array('class' => '')) !!}
      </div>
      
    </div>

    <div class="d-flex justify-content-between">

      <div class="w-100 input-field">
        <input id="input_text" type="password" id="password" name="password" value="{{ old('password') }}">
        <label for="input_text">Password</label>
      </div>

      <div class="mx-2"></div>

      <div class="w-100 input-field">
        <input id="input_text" type="password" id="confirm-password" name="confirm-password" value="{{ old('confirm-password') }}">
        <label for="input_text">Confirm Password</label>
      </div>
      
    </div>

    <div class="w-100 d-flex justify-content-center">
      @can('user_create')
        <button type="submit" class="btn btn-primary px-4">Submit</button>
      @endcan

    </div>

  </form>
</div>


<script>
  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('select');
    M.FormSelect.init(elems);
  });
</script>

@endsection