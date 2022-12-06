@extends('admin/layout')

@section('content')
<h3>DETAIL & PROSES PENYALURAN</h3>
<hr>
<h6 class="py-2 bg-dark text-muted text-center">Validasi Data <i>MUSTAHIK</i></h6>
<div class="container my-3">
    @if(session('success'))
    <p class="alert alert-success">{{ session('success') }}</p>
    @endif
    @foreach($mustahik as $u)
    <div class="">
        
        <div class="col">
            
            <div class="card p-3 py-4">
                
                <div class="text-center">
                    <img src="{{asset('upload/'.$u->photo)}}" width="400" class="img-thumbnail">
                </div>
                
                <div class="text-center mt-3">
                    <span class="bg-secondary p-1 px-4 rounded text-white">No Kartu Keluarga</span>
                    <h5 class="mt-2 mb-0"><b>{{$u->no_kartu_kk}}</b></h5>
                    
                    <hr>
                    
                   <div class="row">
                        <div class="col-lg-6 col-md-12 col-sm-12 bg-light p-3">
                        <h6>Data Pemohon</h6>
                        <div class="card">
                            <ul class="list-group list-group-flush">
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
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 bg-light p-3">
                            <h6>Data Penerima</h6>
                            <div class="card">
                                <ul class="list-group list-group-flush">
                                <li class="list-group-item text-start"><i>Nama :</i> <b>{{$u->nama_penerima}}</b></li>
                                <li class="list-group-item text-start"><i>NIK :</i> <b>{{$u->nik_penerima}}</b></li>
                                <li class="list-group-item text-start"><i>Alamat :</i> <b>{{$u->alamat}}</b></li>
                                </ul>
                            </div>
                        {{-- <h6>Keputusan</h6> --}}
                            <div class="card mt-3">
                                <ul class="list-group list-group-flush">
                                <li class="list-group-item text-start"><i>Tanggal Pengajuan :</i> <b>{{$u->tanggal_pengajuan}}</b></li>

                                <?php 
                                function rupiah($angka){
                                    $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
                                    return $hasil_rupiah;
                                }
                                ?>
                                </ul>
                            </div>
                        </div>
                        </div>
                    </div>
                    <button class="btn btn-success px-4 mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal" disabled>Kamera</button>
                        <button class="btn btn-success px-4 mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal2">Tambah Dokumentasi</button>
                    <h6 class="mt-3 text-center bg-warning text-dark py-3">Dokumentasi Penyaluran</h6>
                        <div class="card">
                            <ul class="list-group list-group-flush">
                            @if(count($penyalur) > 0)
                            <li class="list-group-item text-start">
                            @foreach($penyalur as $s)
                                <b>Dokumentasi</b>
                                <hr>
                                <img src="{{asset('storage/'.$s->photo)}}" width="100%">
                                <blockquote class="text-muted mt-3">{{$s->keterangan}}</blockquote>
                                <center>
                                    <button class="btn btn-success px-4 my-3" data-bs-toggle="modal" data-bs-target="#exampleModal" disabled>Kamera</button>
                                    <button class="btn btn-success px-4 my-3" data-bs-toggle="modal" data-bs-target="#exampleModal2">Tambah Photo</button>
                                    <a href="{{url('/hapus-photo-penyalur/'.$s->penyaluran_id.'/'.$u->mustahik_id)}}" class="btn btn-danger px-4 my-3" onclick="return confirm('Apakah anda yakin ingin menghapus photo ini?');">Hapus Photo</a>
                                </center>
                                @endforeach
                            </li>
                            @else
                            <li class="list-group-item text-start"><b class="text-muted">Dokumentasi belum ada!</b></li>
                            @endif
                            </ul>
                        </div>
                </div>
            </div>
            
        </div>
        
    @endforeach
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="{{url('/simpan-penyaluran')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @foreach($mustahik as $u)
        <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Dokumentasi Penyaluran</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="form-group">
                    <label for="">Nama Petugas Penyalur</label>
                    <input type="text" class="form-control" name="petugas_penyalur">
                </div>
                <div class="form-group">
                    <label for="">Photo</label>
                    <input type="hidden" name="user_id" value="{{$auth->user_id}}">
                    <input type="hidden" name="mustahik_id" value="{{$u->mustahik_id}}">
                    <input type="file" class="form-control" name="photo">
                </div>
                <div class="form-group">
                    <label for="">Keterangan</label>
                    <textarea name="keterangan" class="form-control" cols="30" rows="10"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">PROSES</button>
            </div>
        </div>
    </div>
    @endforeach
    </form>
  </div>

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
                <div class="border p-3 text-center bg-light">
                    <div id="my_camera" class="border m-3 m-auto"></div>
                        <input type=button class="btn btn-success my-3" value="Take Snapshot" onClick="take_snapshot()">
                    <input type="hidden" name="image" class="image-tag">
                    <div id="results" style="width:220px;height:170px;" class="text-center border m-3 m-auto"></div>
                    <i class="text-muted">Hasil Snapshot</i>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">PROSES</button>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.js"></script>
    <script language="JavaScript">
        // menampilkan kamera dengan menentukan ukuran, format dan kualitas 
        Webcam.set({
            width: 220,
            height: 170,
            image_format: 'jpeg',
            jpeg_quality: 90
        });

        //menampilkan webcam di dalam file html dengan id my_camera
        Webcam.attach('#my_camera');

        function take_snapshot() {
        Webcam.snap( function(data_uri) {
            $(".image-tag").val(data_uri);
            document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
        } );

        }
    </script>
    @endforeach
    </form>
  </div>

@endsection