@extends('layouts.app')


@section('content')

@if(Session::has('message'))
<div class="alert alert-info">
        {{Session::get('message')}}
</div>
@endif

{!! Form::open(['route' => 'user.upload' , 'class' => 'form', 'files' => true]) !!}


<div class="form-group">
    {!! Form::label('p_text', 'WRITE TEXT DESCRIPTION') !!}
    {!! Form::textarea('p_text', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('img_name', 'Load IMG') !!}
    {!! Form::file('img_name', null, ['class' => 'form-control']) !!}
</div>


{!! Form::submit('Submit', ['class' => 'btn btn-info']) !!}

{!! Form::close() !!}

@endsection
