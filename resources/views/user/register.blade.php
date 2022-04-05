@extends('layout')

@section('title')

user registration

@endsection

@section('content')

<div class="container mt-4" style="margin-top: 2rem">
    <form action="{{route("user.doregister")}}" method="POST">
        {{ csrf_field() }}
        <div class="card">
            <div class="card-body">
              ~  @include("inc.errors")
                <div class="row">
                    <div class="col-md-4">
                        <label for="">Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Your Name">
                    </div>
                    <div class="col-md-4">
                        <label for="">Email</label>
                        <input type="text" name="email" class="form-control" placeholder="Your Email Address">
                    </div>
                    <div class="col-md-4">
                        <label for="">Mobile</label>
                        <input type="text" name="mobile" class="form-control" placeholder="Your Mobile Number">
                    </div>
                    <div class="col-md-6 mt-3">
                        <label for="">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Create Password">
                    </div>
                    <div class="col-md-6 mt-3">
                        <label for="">Confirm Password</label>
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Retype Password">
                    </div>
                    <div class="col-md-6 mt-3">
                        <button class="btn btn-primary">Register</button>
                    </div>
                    <div class="col-md-12 mt-4">
                        <a href="{{route("user.login")}}">Already have an Account?</a>
                    </div>
                </div>
            </div>
        </div>

    </form>
</div>
@endsection 