@extends('layouts.app')


@section('content')

<br><br>
<br>
<main role="main">



<div class="album py-5 bg-light">
<div class="container">

<div class="row">
<div class="col-md-4">
  <div class="card mb-2 shadow-sm">
    <img class="card-img-top" src="../images/{{ $photo->img_name }}" alt="Card image cap">
    <div class="card-body">
      <p class="card-text">{{ $photo->p_text }} ||</p>
      <div class="d-flex justify-content-between align-items-center">
        <div class="btn-group">
        @if(!Auth::guest())
             @if(Auth::user()->id == $photo->user_id)
             <a class="btn btn-primary" href="/quickstart/public/editphoto/{{ $photo->id }}">Edit</a>

                 {!!Form::open(['action' => ['user@destroy', $photo->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                     {{Form::hidden('_method', 'DELETE')}}
                     {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                 {!!Form::close()!!}
             @endif
         @endif
        </div>
        <small class="text-muted"></small>
      </div>
    </div>
  </div>
</div>


     </div>
   </div>
 </div>


</main>


@endsection
