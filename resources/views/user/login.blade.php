@extends('layout')

@section('title', 'login User')

@section('content')

<div class="container mt-4" style="margin-top: 2rem">
    <form action="{{route("user.dologin")}}" method="POST">
        {{ csrf_field() }}
        <div class="card">
            <div class="card-body">
                @include("inc.errors")
                <div class="row">
                    <div class="col-md-12">
                        <label for="">Mobile</label>
                        <input type="text" name="mobile" class="form-control" placeholder="Your Mobile Number">
                    </div>
                    <div class="col-md-12">
                        <label for="">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Enter Password">
                    </div>
                    <div class="col-md-6 mt-3">
                        <button class="btn btn-primary">Login</button>
                    </div>
                    <div class="col-md-12 mt-4">
                        <a href="{{route("user.register")}}">Don't have an account yet?</a>
                    </div>
                </div>
            </div>
        </div>

    </form>
</div>
@endsection