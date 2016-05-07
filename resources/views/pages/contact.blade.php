@extends('layout')

@section('active-nav')
<li><a href="/">Home</a></li>
<li><a href="/about">About</a></li>
<li class="active"><a href="/contact">Contact</a></li>
@stop

@section('content')

    <div class="container">

      <div class="starter-template">
        <h1>Welcome to the contact page.</h1>
        <p class="lead">Use this document as a way to quickly start any new project.<br> All you get is this text and a mostly barebones HTML document.</p>
      </div>

    </div><!-- /.container -->

@stop
