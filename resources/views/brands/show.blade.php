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
      <a href="{{ route('brands.index') }}">
          <h5 class="m-0 blue-grey-text"><i class="bi bi-arrow-left-square"></i></h5>
      </a>
    </div>

    <div class="w-100 text-center">
      <h4 class="text-truncate mx-0 my-3">Brand Detail</h4>
    </div>

    <div class="text-end me-3">

      @can('brand_edit')
        <a href="{{ route('brands.edit', $brand->id) }}">
            <h5 class="m-0 green-text text-accent-4"><i class="bi bi-pencil-square"></i></h5>
        </a>
      @endcan

    </div>
  </div>
  {{-- End Header --}}
</div>

<div class="w-25 m-auto p-4 border border-danger rounded">
  <div class="w-100 d-flex justify-content-between">
    <div class="w-100">
      <p class="m-0 p-0">Brand Name</p>
      <h5 class="m-0 p-0">{{ $brand->brand_name }}</h5>  
    </div>  

    <div class="mx-3"></div>

    <div class="w-100">
      <p class="m-0 p-0">Brand Code</p>
      <h5 class="m-0 p-0">{{ $brand->brand_code }}</h5>  
    </div>  
  </div>
  <div class="w-100 py-4">
    <p class="m-0 p-0">Brand Note</p>
    <h5 class="m-0 p-0">{{ $brand->brand_note }}</h5>
  </div>

  <div class="w-100 d-flex justify-content-between">
    <div class="w-100">
      <p class="m-0 p-0">Created by</p>
      <p class="m-0 p-0 fs-5">{{ $brand->created_by_name }}</p>  
    </div>  

    <div class="mx-3"></div>

    <div class="w-100">
      <p class="m-0 p-0">Creted Date</p>
      <p class="m-0 p-0 fs-5">{{ $brand->created_at }}</p>  
    </div>  
  </div>
</div>

@endsection
