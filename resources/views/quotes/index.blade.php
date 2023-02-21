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
      <a href="{{ route('quotes.index') }}">
          <h5 class="m-0 blue-grey-text"><i class="bi bi-arrow-left-square"></i></h5>
      </a>
    </div>

    <div class="w-100 text-center">
      <h4 class="text-truncate mx-0 my-3">Quotes Management</h4>
    </div>

    <div class="text-end me-3">

      @can('quote_create')
        <a href="{{ route('quotes.create') }}">
            <h5 class="m-0 green-text text-accent-4"><i class="bi bi-plus-square"></i></h5>
        </a>
      @endcan

    </div>
  </div>
  {{-- End Header --}}
</div>



@endsection