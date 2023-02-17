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
      <h4 class="text-truncate mx-0 my-3">Roles Management</h4>
    </div>

    <div class="text-end me-3">

      @can('role_create')
        <a href="{{ route('roles.create') }}">
            <h5 class="m-0 green-text text-accent-4"><i class="bi bi-plus-square"></i></h5>
        </a>
      @endcan

    </div>
  </div>
  {{-- End Header --}}
</div>

<a class="text-decoration-none text-dark">
  <div class="w-100 d-flex justify-content-between border-bottom py-2">
    <div class="w-100 d-flex justify-content-between">
      <p class="text-center text-truncate m-0" style="width: 5%;">Id</p>
      <p class="text-truncate m-0" style="width: 40%;">Name</p>
      <p class="text-truncate m-0" style="width: 50%;">Note</p>
    </div>
    <div>
      <p class="text-truncate m-0" style="width: 2em;"></p>
    </div>
  </div>
</a>


@foreach ($roles as $key => $role)
{{-- Delete Modal --}}
<div class="modal fade" id="DeleteModal" tabindex="-1" aria-labelledby="DeleteModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-body" data-bs-dismiss="modal" aria-label="Close">

        <form action="{{ route('roles.destroy', $role->id) }}" method="post">

          @csrf
          @method('DELETE')

          <div class="w-100 d-flex justify-content-center mt-3">
            <h1 class="text-danger" style="font-size: 5em;"><i class="bi bi-info-circle"></i></h1>
          </div>
          
          <p class="fs-5 text-center py-3">Are you sure to delete <b class="text-danger">{{ $role->name }}</b>?</p>

          <div class="w-100 d-flex justify-content-end">
            <button type="button" class="btn btn-secondary"  data-bs-dismiss="modal" aria-label="Close">Cancel</button>
            <div class="mx-2"></div>
            <button type="submit" class="btn btn-outline-danger">Confirm</button>
          </div>

        </form>
        
      </div>
    </div>
  </div>
</div>
{{-- End Delete Modal --}}

  <div class="table_hover w-100 d-flex justify-content-between align-items-center border-bottom">
    <a href="{{ route('roles.show',$role->id) }}" class="w-100 text-decoration-none text-dark py-3 waves-effect">
      <div class="w-100 d-flex justify-content-between">
        <p class="text-center text-truncate m-0" style="width: 5%;">{{ $role->id }}</p>
        <p class="text-truncate m-0" style="width: 40%;">{{ $role->name }}</p>
        <p class="text-truncate m-0" style="width: 50%;">{{ $role->description }}</p>
      </div>
    </a>
    <p class="text-truncate" style="width: 2em;">
      <div class="dropdown pe-3">
        <h6 class="transparent" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-three-dots-vertical"></i></h6>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="{{ route('roles.show',$role->id) }}">Detail</a></li>
          @can('role_edit')
            <li><a class="dropdown-item" href="{{ route('roles.edit',$role->id) }}">Update</a></li>
          @endcan
          {{-- @can('role_delete')
          <li><a class="dropdown-item text-danger" href="#" data-bs-toggle="modal" data-bs-target="#DeleteModal">Delete</a></li>
          @endcan --}}

        </ul>
      </div>
    </p>
  </div>
@endforeach

@endsection