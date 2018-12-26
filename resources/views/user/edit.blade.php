@extends('layouts.app')


@section('content')

@if(Session::has('message'))
<div class="alert alert-info">
        {{Session::get('message')}}
</div>
@endif

  {!! Form::open([ 'action' => ['user@uploadafteredit', $photo->id], 'class' => 'form', 'files' => true]) !!}


  <div class="form-group">
      {!! Form::label('p_text', 'WRITE TEXT DESCRIPTION') !!}
      {!! Form::textarea('p_text', " $photo->p_text ", ['class' => 'form-control']) !!}
  </div>
  <div class="form-group">
      {!! Form::label('img_name', 'Load IMG') !!}
      {!! Form::file('img_name', null, ['class' => 'form-control' ]) !!}
  </div>

  {{Form::hidden('_method','PUT')}}
  {!! Form::submit('Submit', ['class' => 'btn btn-info']) !!}

  {!! Form::close() !!}



<div class="col-md-4">
  <div class="card mb-2 shadow-sm">
    <img class="card-img-top" src="images/{{ $photo->img_name }} " alt="Card image cap">
    <div class="card-body">
      <p class="card-text">{{ $photo->p_text }} </p>
      <div class="d-flex justify-content-between align-items-center">

        <small class="text-muted"></small>
      </div>
    </div>
  </div>
</div>

@endsection
