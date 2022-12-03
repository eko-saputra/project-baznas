@extends('admin/layout')

@section('content')
<h3>DETAIL & PROSES VALIDASI</h3>
<hr>
<h6 class="py-2 bg-dark text-muted text-center">Validasi Data <i>MUSTAHIK</i></h6>
<div class="container my-3">
    @foreach($mustahik as $u)
    <div class="">
        
        <div class="col">
            
            <div class="card p-3 py-4">
                
                <div class="text-center">
                    <img src="{{asset('upload/'.$u->photo)}}" width="400" class="img-thumbnail">
                </div>
                
                <div class="text-center mt-3">
                    <span class="bg-secondary p-1 px-4 rounded text-white">{{$u->status_keputusan}}</span>
                    <h5 class="mt-2 mb-0"><b>{{$u->no_kartu_kk}}</b></h5>
                    
                    <hr>
                    
                   <div class="row">
                        <div class="col-lg-6 col-md-12 col-sm-12 bg-light p-3">
                        <h6>Data Pemohon</h6>
                        <div class="card">
                            <ul class="list-group list-group-flush">
                            <li class="list-group-item text-start"><i>No KK :</i> <b>{{$u->no_kartu_kk}}</b></li>
                            <li class="list-group-item text-start"><i>Nama :</i> <b>{{$u->nama_kepala_kk}}</b></li>
                            <li class="list-group-item text-start"><i>Jumlah Tanggungan :</i> <b>{{$u->jumlah_keluarga_tanggungan}}</b> Orang</li>
                            <li class="list-group-item text-start"><i>Pekerjaan :</i> <b>{{$u->pekerjaan}}</b></li>
                            <li class="list-group-item text-start"><i>No HP :</i> <b>{{$u->no_hp}}</b></li>
                            <li class="list-group-item text-start"><i>Jenis Kelamin :</i> <b>{{$u->jenis_kelamin}}</b></li>
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
                            <li class="list-group-item text-start"><i>Kec : </i> <b>{{$kec}}</b></li>
                            <li class="list-group-item text-start"><i>Kel : </i> <b><?= strtr($u->kelurahan,"-"," ");?></b></li>
                            </ul>
                        </div>
                        <h6 class="mt-3">Data Penerima</h6>
                            <div class="card">
                                <ul class="list-group list-group-flush">
                                <li class="list-group-item text-start"><i>Nama :</i> <b>{{$u->nama_penerima}}</b></li>
                                <li class="list-group-item text-start"><i>NIK :</i> <b>{{$u->nik_penerima}}</b></li>
                                <li class="list-group-item text-start"><i>Alamat :</i> <b>{{$u->alamat}}</b></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 bg-light p-3">
                        <h6>Keputusan</h6>
                            <div class="card">
                                <ul class="list-group list-group-flush">
                                <li class="list-group-item text-start"><i>Tanggal Pengajuan :</i> <b>{{$u->tanggal_pengajuan}}</b></li>
                                <?php 
                                    if($u->status_keputusan == 'Pending'){
                                        $bg = 'warning';
                                    } else if($u->status_keputusan == 'Disetujui'){
                                        $bg = 'success';
                                    } else if($u->status_keputusan == 'Ditolak'){
                                        $bg = 'danger';
                                    }
                                ?>

                                <?php 
                                //membuat format rupiah dengan PHP
                                //tutorial www.malasngoding.com
                                
                                function rupiah($angka){
                                    
                                    $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
                                    return $hasil_rupiah;
                                
                                }
                                ?>
                                <li class="list-group-item text-start"><i>Status Keputusan :</i> <b class="badge bg-{{$bg}}">{{$u->status_keputusan}}</b></li>
                                <li class="list-group-item text-start"><i>Pertimbangan/ Saran/ Usul :</i> <b>{{$u->pertimbangan_saran}}</b></li>
                                <li class="list-group-item text-start"><i>Dana yang Disetuji :</i> <b><?= rupiah($u->dana_yang_disetujui);?></b></li>
                                <li class="list-group-item text-start mb-3"><i>Kegunaan :</i> <b>{{$u->kegunaan}}</b></li>
                                </ul>
                            </div>
                            <div class="text-start mt-3">
                           <?php 
                           if($jum == 0) {
                            ?>
                            <button class="btn btn-success px-4" data-bs-toggle="modal" data-bs-target="#exampleModal">VALIDASI</button>
                            <?php  
                        } else {
                            echo "<b class='text-muted'>Ket</b> : <b class='text-warning'>Anda sudah melakukan validasi!</b>";
                        }
                        ?>
                        </div>
                        </div>
                   </div>
                </div>
            </div>
            
        </div>
        
    </div>
    @endforeach
</div>

<!-- Button trigger modal -->
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="{{url('/simpan-keputusan')}}" method="POST">
        @csrf
        @foreach($mustahik as $u)
        <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">PROSES PENETAPAN KEPUTUSAN</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <input type="hidden" name="id" value="{{$u->mustahik_id}}">
                <select name="keputusan" class="form-control">
                    <option value="">- Pilih Keputusan -</option>
                    <option value="Disetujui" <?= $u->status_keputusan == 'Disetujui' ? 'selected' : ''?>>Disetujui</option>
                    <option value="Ditolak" <?= $u->status_keputusan == 'Ditolak' ? 'selected' : ''?>>Ditolak</option>
                </select>
                <div class="form-group my-3">
                    <?php 
                    if($u->pertimbangan_saran != null) {
                        ?>
                    Pertimbangan / Saran yang sudah ditetapkan <b>{{$u->pertimbangan_saran}}</b>
                    <?php
                    } else {
                    ?>
                    <textarea name="pertimbangan" class="form-control" cols="10" rows="4" placeholder="Pertimbangan / Saran / Usul"></textarea>
                    <?php    
                    }
                    ?>
                </div>
                <div class="form-group">
                    <?php 
                    if($u->dana_yang_disetujui != null) {
                        ?>
                        Dana Yang Sudah disetujui <b><?=rupiah($u->dana_yang_disetujui);?></b>
                        <?php
                        } else {
                        ?>
                        
                    <input type="text" class="form-control" name="dana" placeholder="Dana yang disetujui">
                    <?php    
                    }
                    ?>
                </div>
               
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">SIMPAN</button>
            </div>
        </div>
    </div>
    @endforeach
    </form>
  </div>

@endsection