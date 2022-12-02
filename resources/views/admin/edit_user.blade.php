@extends('admin/layout')

@section('content')
<h3>DATA USER</h3>
<hr>
<h6 class="py-2 bg-dark text-muted text-center">Ubah Data <i>USER</i></h6>
<form action="{{url('/ubah_user')}}" method="POST" enctype="multipart/form-data">
    @csrf
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    @if($errors->any())
                        @foreach($errors->all() as $err)
                            <p class="alert alert-danger">{{ $err }}</p>
                        @endforeach
                    @endif
                    @foreach($users as $u)
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nama</label>
                        <input type="text" class="form-control bg-light" id="exampleFormControlInput1" name="nama" value="{{ $u->name }}">
                        <input type="hidden" name="id" value="{{ $u->user_id }}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput2" class="form-label">Username</label>
                        <input type="text" class="form-control bg-light" id="exampleFormControlInput2" name="username" value="{{ $u->username }}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput2" class="form-label">Password</label>
                        <input type="password" class="form-control bg-light" id="exampleFormControlInput2" name="password" value="{{ old('password') }}">
                        <i class="mt-3 text-danger">Kosongkan password jika tidak ada perubahan!</i>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput2" class="form-label">Level</label>
                        <select name="level" class="form-control">
                            <option value="pimpinan" <?= $u->role == 'pimpinan' ? 'selected' : '' ?>>Pimpinan</option>
                            <option value="staff" <?= $u->role == 'staff' ? 'selected' : '' ?>>Staff</option>
                        </select>
                    </div>
                    
                    <div class="mb-5">
                        <button class="btn btn-success" type="submit">UBAH DATA USER</button>
                        <p class="mt-3">
                            <span class="text-danger">INFO </span> : <span class="text-muted">Data user yang ditambahkan hanya sebagai staff.</span>
                        </p>
                    </div>
                    @endforeach
                </div>
            </div>
        </form>
@endsection