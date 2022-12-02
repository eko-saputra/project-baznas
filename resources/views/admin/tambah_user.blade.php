@extends('admin/layout')

@section('content')
<h3>DATA USER</h3>
<hr>
<h6 class="py-2 bg-dark text-muted text-center">Tambah Data <i>USER</i></h6>
<form action="{{url('/simpan_user')}}" method="POST" enctype="multipart/form-data">
    @csrf
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    @if($errors->any())
                        @foreach($errors->all() as $err)
                            <p class="alert alert-danger">{{ $err }}</p>
                        @endforeach
                    @endif
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nama</label>
                        <input type="text" class="form-control bg-light" id="exampleFormControlInput1" name="nama" value="{{ old('nama') }}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput2" class="form-label">Username</label>
                        <input type="text" class="form-control bg-light" id="exampleFormControlInput2" name="username" value="{{ old('username') }}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput2" class="form-label">Password</label>
                        <input type="password" class="form-control bg-light" id="exampleFormControlInput2" name="password" value="{{ old('password') }}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput2" class="form-label">Level</label>
                        <select name="level" class="form-control">
                            <option value="pimpinan">Pimpinan</option>
                            <option value="staff">Staff</option>
                        </select>
                    </div>
                    
                    <div class="mb-5">
                        <button class="btn btn-success" type="submit">SIMPAN DATA USER</button>
                        <p class="mt-3">
                            <span class="text-danger">INFO </span> : <span class="text-muted">Data user yang ditambahkan sesuaikan dengan level hak akses.</span>
                        </p>
                    </div>
                </div>
            </div>
        </form>
@endsection