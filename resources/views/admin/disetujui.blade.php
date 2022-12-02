@extends('admin/layout')

@section('content')
<h1>MUSTAHIK</h1>
<hr>
@if(session('success'))
    <p class="alert alert-success">{{ session('success') }}</p>
@endif
<table class="table table-responsive shadow table-bordered" id="pending">
    <thead>
      <tr class="bg-secondary text-light">
        <th>No KK</th>
        <th>Kepala Keluarga</th>
        <th>Penerima</th>
        <th>Jenis Bantuan</th>
        <th>Status</th>
        <th>Tanggal Pengajuan</th>
    </tr>
    </thead>
    <tbody>
      @foreach($mustahik as $u)
    <tr>
        <td>{{$u->no_kartu_kk}}</td>
        <td>{{$u->nama_kepala_kk}}</td>
        <td>{{$u->nama_penerima}}</td>
        <td>Dumai {{$u->jenis_bantuan}}</td>
        <td><span class="badge bg-success text-light">{{$u->status_keputusan}}</span></td>
        <td>{{$u->created_at}}</td>
      </tr>
    @endforeach
    </tbody>
</table>
@endsection