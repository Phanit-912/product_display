@extends('layouts.app')


@section('content')
<div class="w-100">

  <div class="w-100 d-flex justify-content-between  align-items-center border-bottom">
    <div class="ms-3">
      <a href="{{ route('categories.index') }}">
          <h5 class="m-0 blue-grey-text"><i class="bi bi-arrow-left-square"></i></h5>
      </a>
    </div>

    <div class="w-100 text-center">
      <h4 class="text-truncate mx-0 my-3">Categories Management</h4>
    </div>

    <div class="text-end me-3">

      @can('category_create')
        <a href="{{ route('categories.create') }}">
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
      <p class="text-truncate m-0" style="width: 25%;">Category Name</p>
      <p class="text-truncate m-0" style="width: 30%;">Code</p>
      <p class="text-truncate m-0" style="width: 40%;">Note</p>
    </div>
    <div>
      <p class="text-truncate m-0" style="width: 2em;"></p>
    </div>
  </div>
</a>


@foreach ($categories as $key => $category)

{{-- Delete Modal --}}

<!-- Modal Structure -->
<div id="modal{{ $category->id }}" class="modal modaldeleteBrand" style="background: transparent;">
  <div class="modal-content">

    <form action="{{ route('categories.destroy', $category->id) }}" method="post">
      @csrf
      @method('DELETE')

      <div class="w-100 d-flex justify-content-center mt-3">
        <h1 class="text-danger" style="font-size: 5em;"><i class="bi bi-info-circle"></i></h1>
      </div>
      
      <p class="fs-5 text-center py-3">Are you sure to delete brand <b class="text-danger">{{ $category->category_name }}</b>?</p>

      <div class="w-100 d-flex justify-content-end">
        <button type="button" class="btn waves-effect modal-close">Cancel</button>

        <div class="mx-2"></div>
        
        @can('category_delete')
          <button type="submit" class="btn waves-effect red lighten-1 white-text">Confirm</button>
        @endcan

      </div>
    </form>

  </div>
</div>
{{-- End Delete Modal --}}

  <div class="table_hover w-100 d-flex justify-content-between align-items-center border-bottom">
    <a href="{{ route('categories.show',$category->id) }}" class="w-100 text-decoration-none text-dark py-3 waves-effect">
      <div class="w-100 d-flex justify-content-between">
        <p class="text-center text-truncate m-0" style="width: 5%;">{{ $category->id }}</p>
        <p class="text-truncate m-0" style="width: 25%;">{{ $category->category_name }}</p>
        <p class="text-truncate m-0" style="width: 30%;">{{ $category->category_code }}</p>
        <p class="text-truncate m-0" style="width: 40%;">{{ $category->category_note }}</p>
      </div>
    </a>
    <p class="text-truncate">
      <div class="dropdown pe-3">
        <h6 class="transparent" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-three-dots-vertical"></i></h6>
        <ul class="dropdown-menu">

          @can('category_view')
          <li><a class="dropdown-item" href="{{ route('categories.show',$category->id) }}">Detail</a></li>
          @endcan

          @can('category_edit')
            <li><a class="dropdown-item" href="{{ route('categories.edit',$category->id) }}">Update</a></li>
          @endcan

          @can('category_delete')
          <li><a class="dropdown-item text-danger modal-trigger" href="#modal{{ $category->id }}">Delete</a></li>
          @endcan

        </ul>
      </div>
    </p>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var elems = document.querySelectorAll('.modal');
      M.Modal.init(elems);
    });
  </script>
  
@endforeach


@endsection