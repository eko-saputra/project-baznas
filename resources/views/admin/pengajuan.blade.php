@extends('admin/layout')

@section('content')
<h3>MUSTAHIK</h3>
<p class="text-muted">
  Data mustahik yang sudah melakukan pengajuan tetapi belum diproses.
</p>
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
        <th>Aksi</th>
    </tr>
    </thead>
    <tbody>
      @foreach($mustahik as $u)
    <tr>
        <td>{{$u->no_kartu_kk}}</td>
        <td>{{$u->nama_kepala_kk}}</td>
        <td>{{$u->nama_penerima}}</td>
        <td>Dumai {{$u->jenis_bantuan}}</td>
        <td><span class="badge bg-warning text-dark">{{$u->status_keputusan}}</span></td>
        <td>{{$u->created_at}}</td>
        <td>
            <a href="{{url('/detail-proses-pengajuan/'.$u->mustahik_id)}}" class="btn btn-warning">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmark-star-fill" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M2 15.5V2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.74.439L8 13.069l-5.26 2.87A.5.5 0 0 1 2 15.5zM8.16 4.1a.178.178 0 0 0-.32 0l-.634 1.285a.178.178 0 0 1-.134.098l-1.42.206a.178.178 0 0 0-.098.303L6.58 6.993c.042.041.061.1.051.158L6.39 8.565a.178.178 0 0 0 .258.187l1.27-.668a.178.178 0 0 1 .165 0l1.27.668a.178.178 0 0 0 .257-.187L9.368 7.15a.178.178 0 0 1 .05-.158l1.028-1.001a.178.178 0 0 0-.098-.303l-1.42-.206a.178.178 0 0 1-.134-.098L8.16 4.1z"/>
              </svg>
            </a> 
        </td>
      </tr>
    @endforeach
    </tbody>
</table>
@endsection