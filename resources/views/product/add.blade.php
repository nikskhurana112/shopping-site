@extends("layout")

@section("title", "Add Product")

@section('content')
<div class="container">
    <form action="{{route('admin.product.create')}}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="">Product Name</label>
                    <input type="text" name="product_name" class="form-control" required placeholder="Enter Product Name">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="">Image: </label>
                    <input name="image_path" type="file" accept="images/*">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="">Product Description</label>
                    <textarea name="description" class="form-control" id="" required rows="3" placeholder="Enter Product Description" ></textarea>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">Product Price</label>
                    <input type="number" name="price" class="form-control" required placeholder="Enter Product Price">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                   <button class="btn btn-success">Submit</button>
                </div>
            </div> 
        </div>
    </form>
</div>
@endsection