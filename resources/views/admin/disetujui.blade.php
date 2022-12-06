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
        <td><span class="badge bg-success text-light">{{$u->status_keputusan}}</span></td>
        <td>{{$u->created_at}}</td>
        <td>
            <a href="{{url('/detail-disetujui/'.$u->mustahik_id)}}" class="btn btn-warning">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-ticket-detailed-fill" viewBox="0 0 16 16">
                <path d="M0 4.5A1.5 1.5 0 0 1 1.5 3h13A1.5 1.5 0 0 1 16 4.5V6a.5.5 0 0 1-.5.5 1.5 1.5 0 0 0 0 3 .5.5 0 0 1 .5.5v1.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 11.5V10a.5.5 0 0 1 .5-.5 1.5 1.5 0 1 0 0-3A.5.5 0 0 1 0 6V4.5Zm4 1a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 0-1h-7a.5.5 0 0 0-.5.5Zm0 5a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 0-1h-7a.5.5 0 0 0-.5.5ZM4 8a1 1 0 0 0 1 1h6a1 1 0 1 0 0-2H5a1 1 0 0 0-1 1Z"/>
              </svg>
            </a>  
        </td>
      </tr>
    @endforeach
    </tbody>
</table>
@endsection