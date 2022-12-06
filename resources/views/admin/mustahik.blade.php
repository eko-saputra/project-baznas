@extends('admin/layout')

@section('content')
<h1>MUSTAHIK</h1>
<hr>
<div class="row">
  <div class="col">
    <a href="{{url('/tambah_mustahik')}}" class="btn btn-success mb-3">Tambah Data Mustahik</a>
  </div>
  <div class="col text-end text-muted">
    <i>Download PDF</i> <a href="{{url('mustahik-pdf/')}}" class="btn btn-warning text-dark" target="_blank">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer-fill" viewBox="0 0 16 16">
      <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z"/>
      <path d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
    </svg>
  </a>
  </div>
</div>
@if(session('success'))
    <p class="alert alert-success">{{ session('success') }}</p>
@endif
<table class="table shadow table-bordered" id="mustahik">
   <thead>
    <tr class="bg-secondary text-light">
      <th>Nama Kepala Keluarga</th>
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
        <td>{{$u->nama_kepala_kk}}</td>
        <td>{{$u->nama_penerima}}</td>
        <td>Dumai {{$u->jenis_bantuan}}</td>
        <?php 
                if($u->status_keputusan == 'Pengajuan'){
                  $badge = 'warning';
                } else if($u->status_keputusan == 'Survey'){
                  $badge = 'primary';
                } else if($u->status_keputusan == 'Pleno'){
                  $badge = 'info';
                } else if($u->status_keputusan == 'Pending'){
                  $badge = 'secondary';
                } else if($u->status_keputusan == 'Disetujui'){
                  $badge = 'success';
                } else if($u->status_keputusan == 'Ditolak'){
                  $badge = 'danger';
                }
              ?>
        <td><span class="badge bg-{{$badge}}">{{$u->status_keputusan}}</span></td>
        <td>{{$u->tanggal_pengajuan}}</td>
        <td>
            <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal{{$u->mustahik_id}}">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-ticket-detailed-fill" viewBox="0 0 16 16">
                <path d="M0 4.5A1.5 1.5 0 0 1 1.5 3h13A1.5 1.5 0 0 1 16 4.5V6a.5.5 0 0 1-.5.5 1.5 1.5 0 0 0 0 3 .5.5 0 0 1 .5.5v1.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 11.5V10a.5.5 0 0 1 .5-.5 1.5 1.5 0 1 0 0-3A.5.5 0 0 1 0 6V4.5Zm4 1a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 0-1h-7a.5.5 0 0 0-.5.5Zm0 5a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 0-1h-7a.5.5 0 0 0-.5.5ZM4 8a1 1 0 0 0 1 1h6a1 1 0 1 0 0-2H5a1 1 0 0 0-1 1Z"/>
              </svg>
            </button> 
            <a href="{{url('/edit_mustahik/'.$u->mustahik_id)}}" class="btn btn-warning">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
                <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z"/>
              </svg>
            </a> 
            <a href="{{url('/hapus_mustahik/'.$u->mustahik_id)}}" class="btn btn-warning" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
              </svg>
            </a> 
        </td>
    </tr>
    @endforeach
    </tbody>
  </table>
  @foreach($mustahik as $u)
  <!-- Modal -->
  <div class="modal fade" id="exampleModal{{$u->mustahik_id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">DETAIL</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          {{-- <img src="{{asset('upload/'.$u->photo)}}" width="100%" class="img-thumbnail"> --}}
          <div class="card">
            <img src="{{asset('upload/'.$u->photo)}}" class="card-img-top img-thumbnail">
            <div class="card-body">
              <h5 class="card-title">NO KK <b class="text-success">{{$u->no_kartu_kk}}</b></h5>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">Nama Kepala Keluarga <b>{{$u->nama_kepala_kk}}</b></li>
              <li class="list-group-item">Jumlah Keluarga Tanggungan <b>{{$u->jumlah_keluarga_tanggungan}}</b></li>
              <li class="list-group-item">Pekerjaan <b>{{$u->pekerjaan}}</b></li>
              <li class="list-group-item">No Hp <b>{{$u->no_hp}}</b></li>
              <li class="list-group-item">Jenis Kelamin <b>{{$u->jenis_kelamin}}</b></li>
              <li class="list-group-item">Nama Penerima <b>{{$u->nama_penerima}}</b></li>
              <li class="list-group-item">NIK Penerima <b>{{$u->nik_penerima}}</b></li>
                <?php 
                    if($u->kecamatan == 1){
                        $kec = "Bukit Kapur";
                    } else if($u->kecamatan == 2){
                        $kec = "Dumai Barat";
                    } else if($u->kecamatan == 3){
                        $kec = "Dumai Kota";
                    } else if($u->kecamatan == 4){
                        $kec = "Dumai Selatan";
                    } else if($u->kecamatan == 5){
                        $kec = "Dumai Timur";
                    } else if($u->kecamatan == 6){
                        $kec = "Medang Kampai";
                    } else if($u->kecamatan == 7){
                        $kec = "Sungai Sembilan";
                    }
                ?>
              <li class="list-group-item">Kec :  <b><?=$kec;?></b> | Kel:  <b><?= strtr($u->kelurahan,"-"," ");?></b> | <b>{{$u->alamat}}</b></li>
              <li class="list-group-item">Jenis Bantuan <b>Dumai {{$u->jenis_bantuan}}</b></li>
              <?php 
                if($u->status_keputusan == 'Pending'){
                  $badge = 'warning';
                } else if($u->status_keputusan == 'Disetujui'){
                  $badge = 'success';
                } else if($u->status_keputusan == 'Ditolak'){
                  $badge = 'danger';
                }
              ?>
              @if($u->status_keputusan == 'Disetujui')
              <li class="list-group-item">Pertimbangan / Saran <b>{{$u->pertimbangan_saran}}</b></li>
              <li class="list-group-item">Dana Yang Disetujui <b>{{$u->dana_yang_disetujui}}</b></li>
              @endif
              <li class="list-group-item">Status <b><span class="badge bg-<?=$badge;?>">{{$u->status_keputusan}}</span></b></li>
              <li class="list-group-item">Tanggal Pengajuan <b>{{$u->tanggal_pengajuan}}</b></li>
              <li class="list-group-item">Kegunaan <b>{{$u->kegunaan}}</b></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endforeach
@endsection