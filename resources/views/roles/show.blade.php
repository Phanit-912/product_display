@extends('layouts.app')

@section('content')
<div class="w-100">
  {{-- Header --}}
  @if ($message = Session::get('success'))
  <div class="alert alert-success">
    <p>{{ $message }}</p>
  </div>
  @endif

  <div class="w-100 d-flex justify-content-between align-items-center border-bottom">
    <div class="ms-3">
      <a href="{{ route('roles.index') }}">
          <h5 class="m-0 blue-grey-text"><i class="bi bi-arrow-left-square"></i></h5>
      </a>
    </div>

    <div class="w-100 text-center">
      <h4 class="text-truncate mx-0 my-3">Role Detail</h4>
    </div>

    <div class="text-end me-3">
      <a href="{{ route('roles.edit', ['role' => $role->id]) }}">
          <h5 class="m-0 green-text text-accent-4"><i class="bi bi-pencil-square"></i></h5>
      </a>
    </div>
  </div>
  {{-- End Header --}}

</div>


<div class="w-100 d-flex justify-content-center">
  
    <div class="container p-4">
      <div class="row">

        <div class="w-100 py-2">
          <p class="m-0">Role Name:</p>
          <h6 class="m-0">{{ $role->name }}</h6>
        </div>

        <h6 class="my-3 border-bottom">Permission:</h6>

        @if(!empty($rolePermissions))
          @foreach($rolePermissions as $value)
            <p class="col-3 text-capitalize text-break"><i class="bi pe-2 text-success bi-check2-square"></i>@php echo str_replace("_", ' ', $value->name) @endphp</p>
          @endforeach
        @endif
      </div>
    </div>

</div>
@endsection