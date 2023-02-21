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
      <a href="{{ route('users.index') }}">
          <h5 class="m-0 blue-grey-text"><i class="bi bi-arrow-left-square"></i></h5>
      </a>
    </div>

    <div class="w-100 text-center">
      <h4 class="text-truncate mx-0 my-3">Users Management</h4>
    </div>

    <div class="text-end me-3">

      @can('user_create')
        <a href="{{ route('users.create') }}">
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
      <p class="text-truncate m-0 tooltipped" style="width: 25%;" data-tooltip="Name of User">Name</p>
      <p class="text-truncate m-0 tooltipped" style="width: 30%;" data-tooltip="Email of User">Email</p>
      <p class="text-truncate m-0 tooltipped" style="width: 40%;" data-tooltip="Optional note">Note</p>
    </div>
    <div>
      <p class="text-truncate m-0 tooltipped" style="width: 2em;" data-tooltip="Action">&nbsp;</p>
    </div>
  </div>
</a>

@foreach ($data as $key => $user)

{{-- Delete Modal --}}
<div class="modal fade" id="DeleteModal" tabindex="-1" aria-labelledby="DeleteModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-body" data-bs-dismiss="modal" aria-label="Close">

        <form action="{{ route('users.destroy', $user->id) }}" method="post">

          @csrf
          @method('DELETE')

          <div class="w-100 d-flex justify-content-center mt-3">
            <h1 class="text-danger" style="font-size: 5em;"><i class="bi bi-info-circle"></i></h1>
          </div>
          
          <p class="fs-5 text-center py-3">Are you sure to delete <b class="text-danger">{{ $user->name }}</b>?</p>

          <div class="w-100 d-flex justify-content-end">
            <button type="button" class="btn btn-secondary"  data-bs-dismiss="modal" aria-label="Close">Cancel</button>
            <div class="mx-2"></div>
            @can('user_delete')
              <button type="submit" class="btn btn-outline-danger">Confirm</button>
            @endcan

          </div>

        </form>
        
      </div>
    </div>
  </div>
</div>
{{-- End Delete Modal --}}

  <div class="table_hover w-100 d-flex justify-content-between align-items-center border-bottom">
    <a href="{{ route('users.show',$user->id) }}" class="w-100 text-decoration-none text-dark py-3 waves-effect">
      <div class="w-100 d-flex justify-content-between">
        <p class="text-center text-truncate m-0" style="width: 5%;">{{ $user->id }}</p>
        <p class="text-truncate m-0" style="width: 25%;">{{ $user->name }}</p>
        <p class="text-truncate m-0" style="width: 30%;">{{ $user->email }}</p>
        <p class="text-truncate m-0" style="width: 40%;">{{ $user->created_at }}</p>
      </div>
    </a>
    <p class="text-truncate" style="width: 2em;">
      <div class="dropdown pe-3">
        <h6 class="transparent" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-three-dots-vertical"></i></h6>
        <ul class="dropdown-menu">
          @can('user_view')
          <li><a class="dropdown-item" href="{{ route('users.show',$user->id) }}">Detail</a></li>
          @endcan
          @can('user_edit')
            <li><a class="dropdown-item" href="{{ route('users.edit',$user->id) }}">Update</a></li>
          @endcan
          {{-- @can('user_delete')
          <li><a class="dropdown-item text-danger" href="#" data-bs-toggle="modal" data-bs-target="#DeleteModal">Delete</a></li>
          @endcan --}}

        </ul>
      </div>
    </p>
  </div>
@endforeach

<script>
    document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.tooltipped');
    M.Tooltip.init(elems);
  });
</script>
@endsection