@extends('layout')

@section('active-nav')
<li><a href="/">Home</a></li>
<li class="active"><a href="/about">About</a></li>
<li><a href="/contact">Contact</a></li>
@stop

@section('content')

    <div class="container">

      <div class="starter-template">
        <h1>Welcome to the about page.</h1>
        <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      </div>

    </div><!-- /.container -->

@stop
