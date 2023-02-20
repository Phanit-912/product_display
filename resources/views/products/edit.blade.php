@extends('layouts.app')


@section('content') 
<div class="w-100">
  {{-- Header --}}

  <div class="w-100 d-flex justify-content-between  align-items-center border-bottom">
    <div class="ms-3">
      <a href="{{ route('products.index') }}">
          <h5 class="m-0 blue-grey-text"><i class="bi bi-arrow-left-square"></i></h5>
      </a>
    </div>

    <div class="w-100 text-center">
      <h4 class="text-truncate mx-0 my-3">Update Product</h4>
    </div>

    <div class="text-end me-3">

      {{-- @can('product_create')
        <a href="{{ route('products.create') }}">
            <h5 class="m-0 green-text text-accent-4"><i class="bi bi-plus-square"></i></h5>
        </a>
      @endcan --}}

    </div>
  </div>
  {{-- End Header --}}
</div>

<form action="{{ route('products.update', ['product' => $product->id]) }}" method="POST" enctype="multipart/form-data">
  @csrf
  @method('PUT')

  <div class="w-75 m-auto p-4 border border-danger rounded">

    <div class="w-100 d-flex justify-content-between">
      <div class="w-100">
        <div class="w-100">

          <div class="w-100 d-flex justify-content-center mb-1">
            <img @if ($product['product_image'] != null)
                src="{{ url( '/storage/' . $product['product_image']) }}"
              @else
                src="{{ url('image/no_image.jpg') }}"
              @endif 
              alt="image" class="product_create_img" id="frame">  
          </div>
  
          {{-- Product Image --}}
          <div class="w-100 d-flex justify-content-center">
              <label class="btn mx-auto mt-2" style="cursor: pointer;">
                Upload Image
                <input type="file" size="60" style="display: none" name="product_image" id="formFile" onchange="preview()">
            </label>
            
          </div>

        </div>
        
        <div class="w-100 input-field mb-4">
          <input type="text" class="validate" id="product_name" name="product_name" value="{{ old('product_name', $product->product_name) }}" autofocus>
          <label for="product_name">Product Name</label>
  
          @error('product_name')
            <span class="helper-text red-text" data-error="wrong" data-success="right">{{ $message }}</span>
          @enderror
  
        </div>

        <div class="w-100 input-field mb-4">
          <input type="text" class="validate" id="product_barcode" name="product_barcode" value="{{ old('product_barcode', $product->product_barcode) }}">
          <label for="product_barcode">Barcode</label>
  
          @error('product_barcode')
            <span class="helper-text red-text" data-error="wrong" data-success="right">{{ $message }}</span>
          @enderror
  
        </div>

        <div class="w-100">
          <div class="w-100 d-flex justify-content-between">

            <div class="w-100 input-field mb-4">
              <input type="text" class="validate" id="product_cost" name="product_cost" onClick="this.setSelectionRange(0, this.value.length)" value="{{ old('product_cost', $product->product_cost) }}">
              <label for="product_cost">Cost</label>
      
              @error('product_cost')
                <span class="helper-text red-text" data-error="wrong" data-success="right">{{ $message }}</span>
              @enderror
      
            </div>

            <div class="mx-3"></div>

            <div class="w-100 input-field mb-4">
              <input type="text" class="validate" id="product_general_price" name="product_general_price" onClick="this.setSelectionRange(0, this.value.length)" value="{{ old('product_general_price', $product->product_general_price) }}">
              <label for="product_general_price">General Price</label>
      
              @error('product_general_price')
                <span class="helper-text red-text" data-error="wrong" data-success="right">{{ $message }}</span>
              @enderror
      
            </div>
          </div>

          <div class="w-100 d-flex justify-content-between">
            <div class="w-100 input-field mb-4">
              <input type="text" class="validate" id="product_wholesale_price" name="product_wholesale_price" onClick="this.setSelectionRange(0, this.value.length)" value="{{ old('product_wholesale_price', $product->product_wholesale_price) }}">
              <label for="product_wholesale_price">Wholesale Price</label>
      
              @error('product_wholesale_price')
                <span class="helper-text red-text" data-error="wrong" data-success="right">{{ $message }}</span>
              @enderror
      
            </div>

            <div class="mx-3"></div>

            <div class="w-100 input-field mb-4">
              <input type="text" class="validate" id="product_special_price" name="product_special_price" onClick="this.setSelectionRange(0, this.value.length)" value="{{ old('product_special_price', $product->product_special_price) }}">
              <label for="product_special_price">Sepial Price</label>
      
              @error('product_special_price')
                <span class="helper-text red-text" data-error="wrong" data-success="right">{{ $message }}</span>
              @enderror
      
            </div>
          </div>

          <input type="hidden" name="updated_by_id" value="{{ Auth::user()->id }}">
          <input type="hidden" name="updated_by_name" value="{{ Auth::user()->name }}">      

          <div class="w-100 d-flex justify-content-between">
            <div class="w-100 input-field">
  
              @error('updated_by_id')
                <span class="helper-text red-text" data-error="wrong" data-success="right">{{ $message }}</span>
              @enderror
  
              @error('updated_by_name')
                <span class="helper-text red-text" data-error="wrong" data-success="right">{{ $message }}</span>
              @enderror
  
            </div>
          </div>

        </div>

      </div>
      <div class="mx-3"></div>
      <div class="w-100">

        <div class="w-100 d-flex justify-content-between">

          <div class="w-100 input-field">
            <select name="product_category_id">

              @foreach ($categories as $category)
                @if ($category->id == $product->product_category_id)
                  <option value="{{ $category->id }}" selected>{{ $category->category_name }}</option>
                @endif
                @if ($category->id != $product->product_category_id)
                  <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                @endif
              @endforeach

            </select>
            <label>Select Category</label>

            @error('product_description')
              <span class="helper-text red-text" data-error="wrong" data-success="right">{{ $message }}</span>
            @enderror

          </div>

          <div class="mx-3"></div>

          <div class="w-100 input-field">
            <select name="product_brand_id">
              @foreach ($brands as $brand)
                @if ($brand->id == $product->product_brand_id)
                  <option value="{{ $brand->id }}" selected>{{ $brand->brand_name }}</option>
                @endif
                @if ($brand->id != $product->product_brand_id)
                  <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                @endif
              @endforeach
            </select>
            <label>Select Brand</label>

            @error('product_brand_id')
              <span class="helper-text red-text" data-error="wrong" data-success="right">{{ $message }}</span>
            @enderror

          </div>
        </div>

        <div class="w-100 input-field mb-4">
          <textarea id="product_description" class="materialize-textarea" name="product_description">{{ old('product_description', $product->product_description) }}</textarea>
          <label for="product_description">Description</label>
  
          @error('product_description')
            <span class="helper-text red-text" data-error="wrong" data-success="right">{{ $message }}</span>
          @enderror
  
        </div>
        
      </div>
    </div>

    <div class="w-100 d-flex justify-content-end">

      <a href="{{ route('brands.index') }}">
        <button class="btn red darken-1 waves-effect waves-light" type="button">Cancel</button>
      </a>

      <div class="mx-3"></div>

      <a>
        <button class="btn blue darken-1 waves-effect waves-light" type="submit" name="action">Create</button>
      </a>
      
    </div>
    
  </div>

</form>

<script>
  // Preview Image
  function preview() {
      frame.src = URL.createObjectURL(event.target.files[0]);
  }

  function clearImage() {
      document.getElementById('formFile').value = null;
      frame.src = "";
  }
  // Preview Image

  // Select Category & Brand
  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('select');
    M.FormSelect.init(elems);
  });
</script>

@endsection