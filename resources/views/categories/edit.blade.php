@extends('layouts.app')


@section('content') 
<div class="w-100">
  {{-- Header --}}

  <div class="w-100 d-flex justify-content-between  align-items-center border-bottom">
    <div class="ms-3">
      <a href="{{ route('categories.index') }}">
          <h5 class="m-0 blue-grey-text"><i class="bi bi-arrow-left-square"></i></h5>
      </a>
    </div>

    <div class="w-100 text-center">
      <h4 class="text-truncate mx-0 my-3">Update Category</h4>
    </div>

    <div class="text-end me-3">

      {{-- @can('product_create')
        <a href="{{ route('categories.create') }}">
            <h5 class="m-0 green-text text-accent-4"><i class="bi bi-plus-square"></i></h5>
        </a>
      @endcan --}}

    </div>
  </div>
  {{-- End Header --}}
</div>

<form action="{{ route('categories.update', ['category' => $category->id]) }}" method="POST">
  @csrf
  @method('PUT')

  <div class="w-50 m-auto p-4 border border-danger rounded">

    <div class="w-100 d-flex justify-content-between">
      <div class="w-100 input-field">
        <input type="text" class="validate" id="category_name" name="category_name" value="{{ old('category_name', $category->category_name) }}" autofocus>
        <label for="category_name">Category Name</label>

        @error('category_name')
          <span class="helper-text red-text" data-error="wrong" data-success="right">{{ $message }}</span>
        @enderror

      </div>

      <div class="mx-3"></div>

      <div class="w-100 input-field">
        <input type="text" class="validate" id="category_code" name="category_code" value="{{ old('category_code', $category->category_code) }}">
        <label for="category_code">Category Code</label>

        @error('category_code')
          <span class="helper-text red-text" data-error="wrong" data-success="right">{{ $message }}</span>
        @enderror

      </div>
    </div>

    <input type="hidden" name="updated_by_id" value="{{ Auth::user()->id }}">
    <input type="hidden" name="updated_by_name" value="{{ Auth::user()->name }}">

    <div class="w-100 d-flex justify-content-between">
      <div class="w-100 input-field">
        <textarea id="category_note" class="materialize-textarea" name="category_note">{{ old('category_note', $category->category_note) }}</textarea>
        <label for="category_note">Category Note</label>

        @error('category_note')
          <span class="helper-text red-text" data-error="wrong" data-success="right">{{ $message }}</span>
        @enderror

        @error('updated_by_id')
          <span class="helper-text red-text" data-error="wrong" data-success="right">{{ $message }}</span>
        @enderror

        @error('updated_by_name')
          <span class="helper-text red-text" data-error="wrong" data-success="right">{{ $message }}</span>
        @enderror

      </div>
    </div>

    <div class="w-100 d-flex justify-content-end">

      <a href="{{ route('brands.index') }}">
        <button class="btn red darken-1 waves-effect waves-light" type="button">Cancel</button>
      </a>

      <div class="mx-3"></div>

      <a>
        <button class="btn blue darken-1 waves-effect waves-light" type="submit" name="action">Update</button>
      </a>
    </div>
    
  </div>

</form>

@endsection