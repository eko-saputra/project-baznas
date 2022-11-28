@extends('admin/layout')

@section('content')
<h3>DATA MUSTAHIK</h3>
<hr>
<h6 class="py-2 bg-dark text-muted text-center">Tambah Data <i>MUSTAHIK</i></h6>
<form action="{{url('/mustahik')}}" method="POST" enctype="multipart/form-data">
    @csrf
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    @if($errors->any())
                        @foreach($errors->all() as $err)
                            <p class="alert alert-danger">{{ $err }}</p>
                        @endforeach
                    @endif
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">No Kartu Keluarga</label>
                        <input type="text" class="form-control bg-light" id="exampleFormControlInput1" name="no_kartu_kk" value="{{ old('no_kartu_kk') }}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput2" class="form-label">Nama Kepala Keluarga</label>
                        <input type="text" class="form-control bg-light" id="exampleFormControlInput2" name="nama_kepala_keluarga" value="{{ old('nama_kepala_keluarga') }}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput2" class="form-label">Jumlah Tanggungan</label>
                        <input type="number" class="form-control bg-light" id="exampleFormControlInput2" name="jumlah_tanggungan" value="{{ old('jumlah_tanggungan') }}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput2" class="form-label">Pekerjaan</label>
                        <input type="text" class="form-control bg-light" id="exampleFormControlInput2" name="pekerjaan" value="{{ old('pekerjaan') }}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput3" class="form-label">Nama Penerima</label>
                        <input type="text" class="form-control bg-light" id="exampleFormControlInput3" name="nama_penerima" value="{{ old('nama_penerima') }}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput3" class="form-label">NIK Penerima</label>
                        <input type="text" class="form-control bg-light" id="exampleFormControlInput3" name="nik_penerima" value="{{ old('nik_penerima') }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kecamatan</label>
                        <select class="form-control bg-light" id="kecamatan" name="kecamatan">
                            <option value="">- Pilih Kecamatan -</option>
                            <option value="1">Bukit Kapur</option>
                            <option value="2">Dumai Barat</option>
                            <option value="3">Dumai Kota</option>
                            <option value="4">Dumai Selatan</option>
                            <option value="5">Dumai Timur</option>
                            <option value="6">Medang Kampai</option>
                            <option value="7">Sungai Sembilan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kelurahan</label>
                        <select class="form-control bg-light" id="kelurahan" name="kelurahan">
                            <option value="">- Pilih Kelurahan -</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput4" class="form-label">Alamat</label>
                        <input type="text" class="form-control bg-light" id="exampleFormControlInput4" name="alamat" value="{{ old('alamat') }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jenis Bantuan</label>
                        <select class="form-control bg-light" name="jenis_bantuan">
                            <option value="">- Pilih Jenis Bantuan -</option>
                            <option value="Peduli">Dumai Peduli</option>
                            <option value="Sehat">Dumai Sehat</option>
                            <option value="Makmur">Dumai Makmur</option>
                            <option value="Cerdas">Dumai Cerdas</option>
                            <option value="Taqwa">Dumai Taqwa</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput4" class="form-label">Kegunaan</label>
                        <textarea name="kegunaan" class="form-control" cols="30" rows="10"></textarea>
                    </div>
                    <div class="mb-5">
                        <button class="btn btn-success" type="submit">SIMPAN DATA MUSTAHIK</button>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="border p-3 text-center bg-light">
                        <div id="my_camera" class="border m-3 m-auto"></div>
                            <input type=button class="btn btn-success my-3" value="Take Snapshot" onClick="take_snapshot()">
                        <input type="hidden" name="image" class="image-tag">
                        <div id="results" style="width:220px;height:170px;" class="text-center border m-3 m-auto"></div>
                        <i class="text-muted">Hasil Snapshot</i>
                    </div>
                </div>
            </div>
        </form>
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
@endsection