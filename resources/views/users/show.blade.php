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
      <a href="{{ route('users.index') }}">
          <h5 class="m-0 blue-grey-text"><i class="bi bi-arrow-left-square"></i></h5>
      </a>
    </div>

    <div class="w-100 text-center">
      <h4 class="text-truncate mx-0 my-3">Users Detail</h4>
    </div>

    <div class="text-end me-3">
      <a href="{{ route('users.edit', ['user' => $user->id]) }}">
          <h5 class="m-0 green-text text-accent-4"><i class="bi bi-pencil-square"></i></h5>
      </a>
    </div>
  </div>
  {{-- End Header --}}
</div>

<div class="w-100 d-flex justify-content-center">

  <div class="w-50">

    <div class="w-100">
      <p class="m-0 p-0">Name</p>
      <h6 class="m-0 pb-3 green-text">{{ $user->name }}</h6>
    </div>
    <div class="w-100">
      <p class="m-0 p-0">Email</p>
      <h6 class="m-0 pb-3 green-text">{{ $user->email }}</h6>
    </div>
    <div class="w-100">
      <p class="m-0 p-0">Role</p>
      <h6 class="m-0 pb-3 green-text">
        @if(!empty($user->getRoleNames()))
            @foreach($user->getRoleNames() as $v)
                {{ $v }}
            @endforeach
        @endif
      </h6>
    </div>

  </div>
  
</div>

@endsection