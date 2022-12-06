@extends('admin/layout')

@section('content')
<h3>DETAIL</h3>
<hr>
<h6 class="py-2 bg-dark text-muted text-center">Data <i>MUSTAHIK</i></h6>
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
                    <div class="row mt-3 shadow">
                        <div class="col bg-success p-2 text-light">PENGAJUAN <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-check-all" viewBox="0 0 16 16">
                                <path d="M8.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L2.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093L8.95 4.992a.252.252 0 0 1 .02-.022zm-.92 5.14.92.92a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 1 0-1.091-1.028L9.477 9.417l-.485-.486-.943 1.179z" />
                            </svg>
                        </div>

                        @if(count($survey) > 0)
                        <div class="col bg-success p-2 text-light">SURVEY <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-check-all" viewBox="0 0 16 16">
                                <path d="M8.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L2.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093L8.95 4.992a.252.252 0 0 1 .02-.022zm-.92 5.14.92.92a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 1 0-1.091-1.028L9.477 9.417l-.485-.486-.943 1.179z" />
                            </svg>
                        </div>
                        @else
                        <div class="col bg-secondary p-2 text-light">SURVEY <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-check-all" viewBox="0 0 16 16">
                            <path d="M8.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L2.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093L8.95 4.992a.252.252 0 0 1 .02-.022zm-.92 5.14.92.92a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 1 0-1.091-1.028L9.477 9.417l-.485-.486-.943 1.179z" />
                        </svg>
                        </div>
                        @endif

                        @if(count($pleno) > 0)
                        <div class="col bg-success p-2 text-light">PLENO <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-check-all" viewBox="0 0 16 16">
                                <path d="M8.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L2.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093L8.95 4.992a.252.252 0 0 1 .02-.022zm-.92 5.14.92.92a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 1 0-1.091-1.028L9.477 9.417l-.485-.486-.943 1.179z" />
                            </svg>
                        </div>
                        @else
                        <div class="col bg-secondary p-2 text-light">PLENO <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-check-all" viewBox="0 0 16 16">
                            <path d="M8.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L2.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093L8.95 4.992a.252.252 0 0 1 .02-.022zm-.92 5.14.92.92a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 1 0-1.091-1.028L9.477 9.417l-.485-.486-.943 1.179z" />
                        </svg>
                        </div>
                        @endif

                        <div class="col bg-danger p-2 text-light">DITOLAK <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-check-all" viewBox="0 0 16 16">
                                <path d="M8.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L2.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093L8.95 4.992a.252.252 0 0 1 .02-.022zm-.92 5.14.92.92a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 1 0-1.091-1.028L9.477 9.417l-.485-.486-.943 1.179z" />
                            </svg>
                        </div>
                    </div>
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
                                    if ($u->kecamatan == 1) {
                                        $kec = "Bukit Kapur";
                                    } else if ($u->kecamatan == 2) {
                                        $kec = "Dumai Barat";
                                    } else if ($u->kecamatan == 3) {
                                        $kec = "Dumai Kota";
                                    } else if ($u->kecamatan == 4) {
                                        $kec = "Dumai Selatan";
                                    } else if ($u->kecamatan == 5) {
                                        $kec = "Dumai Timur";
                                    } else if ($u->kecamatan == 6) {
                                        $kec = "Medang Kampai";
                                    } else if ($u->kecamatan == 7) {
                                        $kec = "Sungai Sembilan";
                                    }
                                    ?>
                                    <li class="list-group-item text-start"><i>Kec : </i> <b>{{$kec}}</b></li>
                                    <li class="list-group-item text-start"><i>Kel : </i> <b><?= strtr($u->kelurahan, "-", " "); ?></b></li>
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
                                </ul>
                            </div>

                            <div class="mt-3 text-start">
                                <span class="badge badge-lg bg-danger p-3">Status {{$validasi[0]->status_keputusan}} <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-check-all" viewBox="0 0 16 16">
                                        <path d="M8.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L2.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093L8.95 4.992a.252.252 0 0 1 .02-.022zm-.92 5.14.92.92a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 1 0-1.091-1.028L9.477 9.417l-.485-.486-.943 1.179z" />
                                    </svg></span>
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
    @endsection