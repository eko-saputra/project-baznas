@extends('admin/layout')

@section('content')
<h3>DETAIL & PROSES VALIDASI</h3>
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
                                <li class="list-group-item text-start"><i>Status :</i> <b class="badge bg-info p-2">Pleno</b></li>

                                <?php 
                                function rupiah($angka){
                                    $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
                                    return $hasil_rupiah;
                                }
                                ?>
                                </ul>
                            </div>
                            <?php 
                            if($jum == 0) {
                             ?>
                             <button class="btn btn-success px-4 mt-3 text-start" data-bs-toggle="modal" data-bs-target="#exampleModal">VALIDASI</button>
                             <?php  
                         } else {
                             echo "<b class='text-muted'>Ket</b> : <b class='text-warning'>Anda sudah melakukan validasi!</b>";
                         }
                         ?>
                        </div>
                        </div>
                    </div>
                    <h6 class="mt-3 text-center bg-warning text-dark py-3">Dokumentasi Survey</h6>
                        <div class="card">
                            <ul class="list-group list-group-flush">
                            @if(count($survey) > 0)
                            <li class="list-group-item text-start">
                            @foreach($survey as $s)
                                <b>Dokumentasi</b>
                                <hr>
                                <img src="{{asset('storage/'.$s->photo)}}" width="100%">
                                <blockquote class="text-muted mt-3">{{$s->keterangan}}</blockquote>
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
                <select name="keputusan" class="form-control" id='keputusan'>
                    <option value="">- Pilih Keputusan -</option>
                    <option value="Pending" <?= $u->status_keputusan == 'Disetujui' ? 'selected' : ''?>>Layak untuk diproses</option>
                    <option value="Ditolak" <?= $u->status_keputusan == 'Ditolak' ? 'selected' : ''?>>Ditolak</option>
                </select>
                <label id="title" class="mt-3"></label>
                <div id="alasan"></div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">PROSES</button>
            </div>
        </div>
    </div>
        <script>
            var alasan = document.getElementById("keputusan");
            alasan.addEventListener("change", function(){
                document.getElementById("alasan").innerHTML = '';
                document.getElementById("title").innerHTML = '';
                if(alasan.value == 'Ditolak'){
                    displayAlasan();
                }
            });

            function displayAlasan() {
            document.getElementById("alasan").innerHTML = `

            <textarea class='form-control'></textarea>
            `;
            
            document.getElementById("title").innerHTML = `Pertimbangan / Saran / Alasan`;
            }
        </script>
    @endforeach
    </form>
  </div>

@endsection