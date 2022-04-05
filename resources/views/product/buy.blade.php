@extends('layout')

@section('title','Buy Product')


@section('content')

  <div class="container mt-4" style="margin-top: 2rem">
    <h1>Are you sure you want to buy {{$product->Title}} </h1>
    <a href="{{route("user.product.checkout",['id' => $product])}}" class="btn btn-success btn-sm">Yes</a>
    <a href="{{route("/")}}" class="btn btn-danger btn-sm">No</a>
  </div>

@endsection