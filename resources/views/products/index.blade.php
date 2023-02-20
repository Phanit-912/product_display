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
      <a href="{{ route('products.index') }}">
          <h5 class="m-0 blue-grey-text"><i class="bi bi-arrow-left-square"></i></h5>
      </a>
    </div>

    <div class="w-100 text-center">
      <h4 class="text-truncate mx-0 my-3">Products Management</h4>
    </div>

    <div class="text-end me-3">

      @can('product_create')
        <a href="{{ route('products.create') }}">
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
      <p class="text-center text-truncate m-0" style="width: 5%;"></p>
      <p class="text-truncate m-0" style="width: 35%;">Name</p>
      <p class="text-truncate m-0" style="width: 15%;">Brand</p>
      <p class="text-truncate m-0" style="width: 15%;">Category</p>
      <p class="text-truncate m-0" style="width: 10%;">Price</p>
      <p class="text-truncate m-0" style="width: 10%;">Wholsale</p>
      <p class="text-truncate m-0" style="width: 10%;">Special</p>
    </div>
    <div>
      <p class="text-truncate m-0" style="width: 2em;"></p>
    </div>
  </div>
</a>


@foreach ($products as $key => $product)

{{-- Delete Modal --}}
<div class="modal fade" id="DeleteModal" tabindex="-1" aria-labelledby="DeleteModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-body" data-bs-dismiss="modal" aria-label="Close">

        <form action="{{ route('products.destroy', $product->id) }}" method="post">

          @csrf
          @method('DELETE')

          <div class="w-100 d-flex justify-content-center mt-3">
            <h1 class="text-danger" style="font-size: 5em;"><i class="bi bi-info-circle"></i></h1>
          </div>
          
          <p class="fs-5 text-center py-3">Are you sure to delete <b class="text-danger">{{ $product->name }}</b>?</p>

          <div class="w-100 d-flex justify-content-end">
            <button type="button" class="btn btn-secondary"  data-bs-dismiss="modal" aria-label="Close">Cancel</button>
            <div class="mx-2"></div>
            @can('product_delete')
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
    <a href="{{ route('products.show',$product->id) }}" class="w-100 text-decoration-none text-dark py-2 waves-effect">
      <div class="w-100 d-flex justify-content-between align-items-center">
        <p class="text-center text-truncate m-0" style="width: 5%;">
          <img @if ($product['product_image'] != null)
              src="{{ url( '/storage/' . $product['product_image']) }}"
            @else
              src="{{ url('image/no_image.jpg') }}"
            @endif 
            alt="image" style="width: 2em; height: 2em;">  
        </p>
        <p class="text-truncate m-0" style="width: 35%;">{{ $product->product_name }}</p>
        <p class="text-truncate m-0" style="width: 15%;">{{ $product->brand_name }}</p>
        <p class="text-truncate m-0" style="width: 15%;">{{ $product->category_name }}</p>
        <p class="text-truncate m-0" style="width: 10%;">$ {{ $product->product_general_price }}</p>
        <p class="text-truncate m-0" style="width: 10%;">$ {{ $product->product_wholesale_price }}</p>
        <p class="text-truncate m-0" style="width: 10%;">$ {{ $product->product_special_price }}</p>
      </div>
    </a>
    <p class="text-truncate">
      <div class="dropdown pe-3">
        <h6 class="transparent" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-three-dots-vertical"></i></h6>
        <ul class="dropdown-menu">
          @can('product_list')
          <li><a class="dropdown-item" href="{{ route('products.show',$product->id) }}">Detail</a></li>
          @endcan
          @can('product_edit')
            <li><a class="dropdown-item" href="{{ route('products.edit',$product->id) }}">Update</a></li>
          @endcan
          @can('product_delete')
          <li><a class="dropdown-item text-danger" href="#" data-bs-toggle="modal" data-bs-target="#DeleteModal">Delete</a></li>
          @endcan

        </ul>
      </div>
    </p>
  </div>
@endforeach

@endsection