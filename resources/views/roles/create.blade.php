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
      <h4 class="text-truncate mx-0 my-3">Set Permission</h4>
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

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br>
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif

<div class="w-100">
  <form action="{{ route('roles.store') }}" method="POST">

    @csrf

    <div class="w-100 p-4">

      <div class="w-100 d-flex justify-content-between">
        <div class="w-25 input-field">
          <input id="input_text" type="text" id="role_name" name="name" value="{{ old('name') }}" autofocus>
          <label for="input_text">Role Name</label>
        </div>
        <div class="mx-2"></div>
        <div class="w-75 input-field">
          <textarea id="description" class="materialize-textarea" data-length="800" name="description">{{ old('description') }}</textarea>
          <label for="description">Description</label>
        </div>
      </div>

      <h4 class="my-3">Permission: </h4>

      <div class="container">
        <div class="row">

          @foreach($permission as $value)
            <label class="text-dark col-3 p-2 text-capitalize">
              {{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
              <span>@php echo str_replace("_", ' ', $value->name) @endphp</span>
            </label>
            {{-- <p class="col-3 text-capitalize text-break">{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }} {{ $value->name }}</p> --}}
          @endforeach

        </div>
      </div>

      <div class="w-100 d-flex justify-content-center mt-3 pb-2 border-bottom">
        @can('role_create')
          <button type="submit" class="btn waves-effect white-text waves-light px-4 ">Submit</button>
        @endcan

      </div>

    </div>
  </form>
</div>





{{-- {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Permission:</strong>
            <br/>
            @foreach($permission as $value)
                <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                {{ $value->name }}</label>
            <br/>
            @endforeach
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
{!! Form::close() !!} --}}

@endsection