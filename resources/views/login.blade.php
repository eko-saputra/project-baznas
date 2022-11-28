@extends('layout')
@section('content')
            <div class="row bg-success form-login rounded">
                <div class="col-lg-6 col-md-12">
                    <img src="{{asset('images/login-copy.webp')}}" width="100%">
                </div>
                <div class="col-lg-6 col-md-12 p-5">
                    <h3 class="text-light">LOGIN</h3>
                    <form action="{{url('login')}}" method="POST">
                      @csrf
                      <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label text-light">Username</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="username" placeholder="Username">
                    </div>
                    <div class="mb-5">
                        <label for="exampleFormControlInput2" class="form-label text-light">Password</label>
                        <input type="password" class="form-control" id="exampleFormControlInput2" name="password" placeholder="Password">
                    </div>
                    <div class="d-grid gap-2">
                        <button class="btn btn-warning btn-lg text-light" type="submit">LOGIN to authenticate</button>
                    </div>
                    <div class="mt-3">
                      @if($errors->any())
                      @foreach($errors->all() as $err)
                      <p class="alert alert-danger">{{ $err }}</p>
                      @endforeach
                      @endif
                    </div>
                    </form>
                </div>
            </div>
    @endsection