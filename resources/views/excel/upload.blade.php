@extends("layout")

@section("title", "Upload Data")

@section('content')

<br>
<div class="container">
    <form action="{{route("admin.product.excel_create")}}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="row">
            
            <div class="col-md-12">
                <div class="form-group">
                    <label for="">Upload Excel File: </label>
                    <input name="excel_data" type="file" accept="">
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