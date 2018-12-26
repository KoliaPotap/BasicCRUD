<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">

        <meta name="viewport" content="width=device-width, initial-scale=1">
        {{ Html::style('css/app.css') }}
        {{ Html::style('css/main.css') }}

        <title> </title>
    </head>
    <body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="{{route('main')}}">Blog</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <?php if (Auth::check()) : ?>
          <li class="nav-item">
            <a class="nav-link" href="{{route('upload')}}">Upload </a>
          </li>
        <?php endif; ?>
          <li class="nav-item">
            <a class="nav-link" href="{{route('allphoto')}}">New photos</a>
          </li>
        </ul>
      </div>
      <div class=" order-3 ">
      <ul class="navbar-nav ml-auto">
        <?php if (!Auth::check()) : ?>
        <li class="nav-item">
          <a class="nav-link" href="{{route('login')}}">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('register')}}">Register</a>
        </li>
      <?php endif; ?>
      <?php if (Auth::check()) : ?>
      <li class="nav-item">
        <a class="nav-link" href="{{route('logout')}}">Logout</a>
      </li>
    <?php endif; ?>
      </ul>
  </div>
  </nav>

    <br>
    <?php Session::all(); ?>
          @yield('content')
    </body>
    {{ Html::script('js/app.css') }}     <!-- public/js/app.css ->


</html>
