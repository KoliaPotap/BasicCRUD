@extends('layouts.app')

@section('content')

      <main role="main">



 <div class="album py-5 bg-light">
   <div class="container">

     <div class="row">

<?php foreach ($photos as $photo): ?>

  <div class="col-md-4">
    <div class="card mb-2 shadow-sm">
      <img class="card-img-top" src="images/{{ $photo->img_name }} " alt="Card image cap">
      <div class="card-body">
        <p class="card-text">{{ $photo->p_text }}</p>
        <div class="d-flex justify-content-between align-items-center">
          <div class="btn-group">
            <a class="btn btn-sm btn-outline-secondary" href="/quickstart/public/show/{{ $photo->id }}">View</a>
            <?php if (!Auth::guest()) : ?>
                  <?php if (auth()->user()->id === $photo->user_id) : ?>
              <a class="btn btn-sm btn-outline-secondary" href="/quickstart/public/editphoto/{{ $photo->id }}">Edit</a>
          <?php endif; ?>
        <?php endif; ?>
      
          </div>
          <small class="text-muted"></small>
        </div>
      </div>
    </div>
  </div>

<?php endforeach; ?>



     </div>
   </div>
 </div>
<div class="container">

</div>

</main>

@endsection
