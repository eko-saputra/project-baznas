@extends('layout')

@section('content')
        <div class="container shadow pb-3">
          <img src="{{asset('images/banner1.png')}}" class="mb-3 mt-3" width="100%">
          <hr>
          <?php 
                                function rupiah($angka){
                                    
                                    $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
                                    return $hasil_rupiah;
                                
                                }
                                ?>
                                
          <h3><span class="text-success">DATA</span> <b class="text-warning">MUSTAHIK</b></h3>
          <hr>
          <table class="table bg-white table-bordered" id="mustahik">
            <thead>
              <tr class="bg-light">
                <th scope="col">Nama Kepala Keluarga</th>
                <th scope="col">Kelurahan</th>
                <th scope="col">Hasil Keputusan</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Jenis Bantuan</th>
                <th scope="col">Tanggal</th>
                <th scope="col" class="text-center">Detail</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($mustahik as $u)
              <tr>
                <td>{{$u->nama_kepala_kk}}</td>
                <td><?= strtr($u->kelurahan,"-"," ");?></td>
                <?php 
                                    if($u->status_keputusan == 'Pending'){
                                        $bg = 'warning';
                                    } else if($u->status_keputusan == 'Disetujui'){
                                        $bg = 'success';
                                    } else if($u->status_keputusan == 'Ditolak'){
                                        $bg = 'danger';
                                    }
                                ?>
                <td>
                  <span class="badge bg-{{$bg}}">{{$u->status_keputusan}}</span>
                </td>
                <td><?=rupiah($u->dana_yang_disetujui);?></td>
                <td>Dumai {{$u->jenis_bantuan}}</td>
                <td>{{$u->tanggal_pengajuan}}</td>
                <td class="text-center">
                  <button data-bs-toggle="modal" data-bs-target="#exampleModal{{$u->mustahik_id}}" class="btn btn-warning text-dark">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-ticket-detailed-fill" viewBox="0 0 16 16">
                      <path d="M0 4.5A1.5 1.5 0 0 1 1.5 3h13A1.5 1.5 0 0 1 16 4.5V6a.5.5 0 0 1-.5.5 1.5 1.5 0 0 0 0 3 .5.5 0 0 1 .5.5v1.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 11.5V10a.5.5 0 0 1 .5-.5 1.5 1.5 0 1 0 0-3A.5.5 0 0 1 0 6V4.5Zm4 1a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 0-1h-7a.5.5 0 0 0-.5.5Zm0 5a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 0-1h-7a.5.5 0 0 0-.5.5ZM4 8a1 1 0 0 0 1 1h6a1 1 0 1 0 0-2H5a1 1 0 0 0-1 1Z"/>
                    </svg>
                  </button>
                  <a href="{{url('generate-pdf/'.$u->mustahik_id)}}" class="btn btn-warning text-dark" target="_blank">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer-fill" viewBox="0 0 16 16">
                    <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z"/>
                    <path d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
                  </svg>
                </a>
                  <a class="btn btn-warning" href="{{ url('mustahik-export/'.$u->mustahik_id) }}"><img src="{{asset('images/excel.svg')}}" width="20"></a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>

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
            {{-- <img src="{{asset('upload/'.$u->photo)}}" class="card-img-top img-thumbnail"> --}}
            <div class="card-body">
              <h3 class="card-title"><b class="text-success">{{$u->no_kartu_kk}}</b></h3>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">Nama Kepala Keluarga <b>{{$u->nama_kepala_kk}}</b></li>
              <li class="list-group-item">Nama Penerima <b>{{$u->nama_penerima}}</b></li>
              <li class="list-group-item">No HP <b>{{$u->no_hp}}</b></li>
              <li class="list-group-item">Jenis Kelamin <b>{{$u->jenis_kelamin}}</b></li>
              <li class="list-group-item">Alamat <b>{{$u->alamat}}</b></li>
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
              <li class="list-group-item">Dana Yang Disetujui <b><?=rupiah($u->dana_yang_disetujui);?></b></li>
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