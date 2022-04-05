@extends("layout")

@section("title", 'New Products')

@section('content')
<div class="container">
    <table class="table table-bordered table-striped table-hover">
        <tr>
            <th>Id</th>
            <th>Product Name</th>
            <th>Image</th>
            <th>Product Description</th>
            <th>Product Price</th>
            <th>Checkout</th>
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
            <td>{{$product->short_description}}</td>
            <td>{{$product->Price}}</td>
            <td>
                <a href="{{route("user.product.buy", ['id' => $product->id])}}" class="btn btn-success btn-sm">Buy Now</a>
            </td>
        </tr>
        @endforeach
    </table>
    {{$products->links()}}
</div>
@endsection

