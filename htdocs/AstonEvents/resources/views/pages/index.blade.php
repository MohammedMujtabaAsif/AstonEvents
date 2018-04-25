@extends('layouts.app') 
@section('content')
<div class="jumbotron text-center">
    <h1>Home Page</h1>
    @guest
    <hr>
    <p>Have an account? Register to become an organiser!</p>
    <p><a class="btn btn-primary btn-lg" href="/login">Login</a> <a class="btn btn-success btn-lg" href="/register">Register</a></p>
    @else
    <hr>
    <p>Ready to organise some more events?</p>
    @endguest
</div>
@endsection