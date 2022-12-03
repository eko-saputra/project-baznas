@extends('admin/layout')

@section('content')
<h1>MUSTAHIK</h1>
<hr>
<div class="row">
  <div class="col">
    <a href="{{url('/tambah_mustahik')}}" class="btn btn-success mb-3">Tambah Data Mustahik</a>
  </div>
  <div class="col text-end text-muted">
    <i>Download ke EXCEL</i> <a class="btn btn-warning" href="{{ url('mustahik-export-staff') }}"><img src="{{asset('images/excel.svg')}}" width="20"></a>
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
                if($u->status_keputusan == 'Pending'){
                  $badge = 'warning';
                } else if($u->status_keputusan == 'Disetujui'){
                  $badge = 'success';
                } else if($u->status_keputusan == 'Ditolak'){
                  $badge = 'danger';
                }
              ?>
        <td><span class="badge bg-{{$badge}}">{{$u->status_keputusan}}</span></td>
        <td>{{$u->tanggal_pengajuan}}</td>
        <td>
            <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal{{$u->mustahik_id}}">Detail</button> 
            <a href="{{url('/edit_mustahik/'.$u->mustahik_id)}}" class="btn btn-primary">Edit</a> 
            <a href="{{url('/hapus_mustahik/'.$u->mustahik_id)}}" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');">Hapus</a> 
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
              <li class="list-group-item">Pertimbangan / Saran <b>{{$u->pertimbangan_saran}}</b></li>
              <li class="list-group-item">Dana Yang Disetujui <b>{{$u->dana_yang_disetujui}}</b></li>
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