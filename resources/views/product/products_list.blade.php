@extends('layout')

@section('title','Product List')


@section('content')
<div class="container">
    <table class="table table-bordered table-striped table-hover">
        <tr>
            <th>Id</th>
            <th>Product Name</th>
            <th>Image</th>
            <th>Product Description</th>
            <th>Product Price</th>
            <th>Delete Product</th>
            <th>Edit Product</th>
        </tr>
        @foreach($products as $product)
        <tr>
            <td>{{$product->id}}</td>
            <td>{{$product->Title}}</td>
            <td>
                @if ($product->ImagePath != null)
                    <img src="{{getImageUrl($product->ImagePath)}}" alt="" width="100px">
                @endif
            </td>
            <td>{{$product->Description}}</td>
            <td>{{$product->Price}}</td>
            <td>
                <a href="{{route("admin.product.delete_product", ['id' => $product->id])}}" class="btn btn-danger btn-sm">Delete</a>
            </td>
            <td>
                <a href="{{route("admin.product.edit_product", ['id' => $product->id])}}" class="btn btn-success btn-sm">Edit</a>
            </td>
        </tr>
        @endforeach
        </table>
       
    </div>
@endsection