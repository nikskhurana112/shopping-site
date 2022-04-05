@extends("layout");

@section("title", 'New Orders');

@section('content')
<div class="container">
    <table class="table table-bordered table-striped table-hover">
        <tr>
            <th>Id</th>
            <th>Product ID</th>
            <th>User ID</th>
            <th>Order Created At</th>
        </tr>
        @foreach($orders as $order)
        <tr>
            <td>{{$order->id}}</td>
            <td>{{$order->product->Title}}</td>
            <td>{{$order->user->name}}</td>
            <td>{{$order->created_at}}</td>
        </tr>
        @endforeach
    </table>
</div>

@endsection