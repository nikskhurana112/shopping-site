@extends('layout')

@section('title','Product Order Success')


@section('content')

  <div class="container mt-4" style="margin-top: 2rem">
    <h1>You have Successfully ordered the  {{$product->Title}} </h1>
  </div>

@endsection