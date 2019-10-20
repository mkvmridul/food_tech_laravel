@extends('layouts/master')
@section('header')
    <link rel="stylesheet" type="text/css" href="/css/welcome.css">
@endsection
@section('main')
    <div class="main">
        <div class="container">
            <br><br>
            <h3 class="text-secondary">BOOK YOUR MEAL NOW @ <span class="text-success">50%</span> off</h3>
            <br>
            <button class="btn btn-lg btn-outline-primary" onclick="window.location.href = '{{route('menus')}}'">ORDER NOW</button>
        </div>
    </div>
@endsection