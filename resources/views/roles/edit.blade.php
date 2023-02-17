@extends('layouts.app')


@section('content')
<div class="w-100">
  {{-- Header --}}
  @if ($message = Session::get('success'))
  <div class="alert alert-success">
    <p>{{ $message }}</p>
  </div>
  @endif

  <div class="w-100 d-flex justify-content-between  align-items-center border-bottom">
    <div class="ms-3">
      <a href="{{ route('roles.index') }}">
          <h5 class="m-0 blue-grey-text"><i class="bi bi-arrow-left-square"></i></h5>
      </a>
    </div>

    <div class="w-100 text-center">
      <h4 class="text-truncate mx-0 my-3">Update Permission</h4>
    </div>

    <div class="text-end me-3">

      {{-- @can('role_create')
        <a href="{{ route('roles.create') }}">
            <h5 class="m-0 green-text text-accent-4"><i class="bi bi-plus-square"></i></h5>
        </a>
      @endcan --}}

    </div>
  </div>
  {{-- End Header --}}
</div>

<div class="w-100">
  <form action="{{ route('roles.update', ['role' => $role->id]) }}" method="POST">

    @csrf
    @method('PUT')

    <div class="w-100 p-4">

      <div class="w-100 d-flex justify-content-between">
        <div class="w-25 input-field">
          <input id="input_text" type="text" id="role_name" name="name" value="{{ $role->name }}">
          <label for="input_text">Role Name</label>
        </div>
        <div class="mx-2"></div>
        <div class="w-75 input-field">
          <textarea id="description" class="materialize-textarea" data-length="800" name="description">{{ $role->description }}</textarea>
          <label for="description">Description</label>
        </div>
      </div>


      <h4 class="my-3">Permission: </h4>

      <div class="container">
        <div class="row">

          @foreach($permission as $value)
            <label  class="text-dark col-3 p-2 text-capitalize">
              {{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
              <span>@php echo str_replace("_", ' ', $value->name) @endphp</span>
            </label>
            {{-- <p class="col-3 text-capitalize text-break">{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }} {{ $value->name }}</p> --}}
          @endforeach

        </div>
      </div>

      <div class="w-100 d-flex justify-content-center mt-3 pb-2 border-bottom">
        <button type="submit" class="btn btn-primary px-4">Submit</button>
      </div>

    </div>
  </form>
</div>

@endsection
