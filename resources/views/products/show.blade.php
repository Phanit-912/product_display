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
      <h4 class="text-truncate mx-0 my-3">Products Detail</h4>
    </div>

    <div class="text-end me-3">

      @can('product_create')
        <a href="{{ route('products.edit', $product->id) }}">
            <h5 class="m-0 green-text text-accent-4"><i class="bi bi-pencil-square"></i></h5>
        </a>
      @endcan

    </div>
  </div>
  {{-- End Header --}}
</div>

<div class="w-75 m-auto border border-danger rounded p-4">

  <div class="w-100 d-flex justify-content-between">

    <div class="w-100">

      <div class="w-100 py-3  d-flex justify-content-center">
        <img @if ($product['product_image'] != null)
              src="{{ url( '/storage/' . $product['product_image']) }}"
            @else
              src="{{ url('image/no_image.jpg') }}"
            @endif 
            alt="image" class="product_show_detail">  
      </div>

      <div class="w-100 py-3">
        <p class="m-0 p-0 text-secondary">Product Name</p>
        <p class="m-0 fs-5 py-1">{{ $product->product_name }}</p>
      </div>
  
      <div class="w-100 py-3 d-flex justify-content-between">
        <div class="w-100">
          <p class="m-0 p-0 text-secondary">Cost</p>
          <p class="m-0 fs-5 py-1">$ {{ $product->product_cost }}</p>
        </div>
  
        <div class="mx-3"></div>
  
        <div class="w-100">
          <p class="m-0 p-0 text-secondary">General Price</p>
          <p class="m-0 fs-5 py-1">$ {{ $product->product_general_price }}</p>
        </div>
      </div>

      <div class="w-100 py-3 d-flex justify-content-between">
        <div class="w-100">
          <p class="m-0 p-0 text-secondary">Wholesale Price</p>
          <p class="m-0 fs-5 py-1">$ {{ $product->product_wholesale_price }}</p>
        </div>
  
        <div class="mx-3"></div>
  
        <div class="w-100">
          <p class="m-0 p-0 text-secondary">Special Price</p>
          <p class="m-0 fs-5 py-1">$ {{ $product->product_special_price }}</p>
        </div>
      </div>

      <div class="w-100 py-3 d-flex justify-content-between">
        <div class="w-100">
          <p class="m-0 p-0 text-secondary">Category</p>
          <p class="m-0 fs-5 py-1">
            @foreach ($category as $cate)
              {{ $cate->category_name }}
            @endforeach
          </p>
        </div>
  
        <div class="mx-3"></div>
  
        <div class="w-100">
          <p class="m-0 p-0 text-secondary">Brand</p>
          <p class="m-0 fs-5 py-1">
            @foreach ($brand as $bran)
              {{ $bran->brand_name }}
            @endforeach  
          </p>
        </div>
      </div>

    </div>

    <div class="mx-3"></div>

    <div class="w-100">

      <div class="w-100 py-3">
        <p class="m-0 p-0 text-secondary">Product Barcode</p>
        <p class="m-0 fs-5 py-1">{{ $product->product_barcode }}</p>
      </div>

      <div class="w-100 py-3">
        <p class="m-0 p-0 text-secondary">Product Description</p>
        <p class="m-0 fs-5 py-1">{{ $product->product_description }}</p>
      </div>

    </div>

  </div>

</div>
@endsection
