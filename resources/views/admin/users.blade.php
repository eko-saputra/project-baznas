@extends('admin/layout')

@section('content')
<h1>USERS</h1>
<hr>
<a href="{{url('/tambah_user')}}" class="btn btn-success mb-3">Tambah Data User</a>
@if(session('success'))
    <p class="alert alert-success">{{ session('success') }}</p>
@endif
<table class="table shadow table-bordered" id="users">
    <thead>
        <tr class="bg-secondary text-light">
            <th>Nama</th>
            <th>Username</th>
            <th>Role</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $u)
    <tr>
        <td>{{$u->name}}</td>
        <td>{{$u->username}}</td>
        <td>{{$u->role}}</td>
        <td>
            <a href="{{url('/edit_user/'.$u->user_id)}}" class="btn btn-primary">Ubah</a> 
            <a href="{{url('/hapus_user/'.$u->user_id)}}" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');">Hapus</a> 
        </td>
    </tr>
    @endforeach
    </tbody>
  </table>
</table>
@endsection