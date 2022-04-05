@extends('layout')

@section('title','Edit Product')


@section('content')
      <div class="container">
          <form action="{{route('admin.product.update_product')}}" method="POST">
            {{ csrf_field() }}
              <div class="form-group">
                  <label for="">Product Name</label>
                  <input type="text" name="title" required value="{{$product->Title}}" class="form-control">
              </div>
              <div class="form-group">
                  <label for="">Image: </label>
                  {{-- <div>
                    @if ($product->ImgPath != null)
                        <img src="{{URL('storage/'.$Product->ImgPath)}}" alt="" width="100px">
                    @endif
                  </div> --}}
                  <input type="file" name="img_path" accept="images/*">
              </div>
            <div class="form-group">
                <label for="">Description</label>
                <textarea name="description" class="form-control" id="" value="{{$product->Description}}" required rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="">Price</label>
                <input type="number" name="price" required value="{{$product->Price}}" class="form-control">
            </div>
              
            <div><input type="hidden" name="id"  value="{{$product->id}}"></div>

              <div class="form-group">
                  <button class="btn btn-primary">Submit</button>
              </div>
          </form>
      </div>
@endsection