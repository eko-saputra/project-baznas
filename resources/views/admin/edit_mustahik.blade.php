@extends('admin/layout')

@section('content')
<h3>DATA MUSTAHIK</h3>
<hr>
<h6 class="py-2 bg-dark text-muted text-center">Ubah Data <i>MUSTAHIK</i></h6>
<form action="{{url('/ubah_mustahik')}}" method="POST" enctype="multipart/form-data">
    @csrf
    @foreach($mustahik as $u)
            <div class="row">
                <div class="col-8">
                    @if($errors->any())
                        @foreach($errors->all() as $err)
                            <p class="alert alert-danger">{{ $err }}</p>
                        @endforeach
                    @endif
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">No Kartu Keluarga</label>
                        <input type="text" class="form-control bg-light" id="exampleFormControlInput1" name="no_kartu_kk" value="{{$u->no_kartu_kk}}">
                        <input type="hidden" class="form-control" id="exampleFormControlInput1" name="id" value="{{$u->mustahik_id}}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput2" class="form-label">Nama Kepala Keluarga</label>
                        <input type="text" class="form-control bg-light" id="exampleFormControlInput2" name="nama_kepala_keluarga" value="{{$u->nama_kepala_kk}}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput2" class="form-label">Jumlah Tanggungan</label>
                        <input type="number" class="form-control bg-light" id="exampleFormControlInput2" name="jumlah_tanggungan" value="{{$u->jumlah_keluarga_tanggungan}}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput2" class="form-label">Pekerjaan</label>
                        <input type="text" class="form-control bg-light" id="exampleFormControlInput2" name="pekerjaan" value="{{$u->pekerjaan}}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput3" class="form-label">Nama Penerima</label>
                        <input type="text" class="form-control bg-light" id="exampleFormControlInput3" name="nama_penerima" value="{{$u->nama_penerima}}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput3" class="form-label">NIK Penerima</label>
                        <input type="text" class="form-control bg-light" id="exampleFormControlInput3" name="nik_penerima" value="{{$u->nik_penerima}}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kecamatan</label>
                        <select class="form-control" id="kecamatan1" name="kecamatan">
                            <option value="">- Pilih Kecamatan -</option>
                            <option value="1" <?= $u->kecamatan == 1 ? 'selected': '' ?>>Bukit Kapur</option>
                            <option value="2" <?= $u->kecamatan == 2 ? 'selected': '' ?>>Dumai Barat</option>
                            <option value="3" <?= $u->kecamatan == 3 ? 'selected': '' ?>>Dumai Kota</option>
                            <option value="4" <?= $u->kecamatan == 4 ? 'selected': '' ?>>Dumai Selatan</option>
                            <option value="5" <?= $u->kecamatan == 5 ? 'selected': '' ?>>Dumai Timur</option>
                            <option value="6" <?= $u->kecamatan == 6 ? 'selected': '' ?>>Medang Kampai</option>
                            <option value="7" <?= $u->kecamatan == 7 ? 'selected': '' ?>>Sungai Sembilan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kelurahan</label>
                        <select class="form-control bg-light" id="kelurahan1" name="kelurahan">
                            <option value="<?= strtr($u->kelurahan,"-"," ");?>"><?= strtr($u->kelurahan,"-"," ");?></option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput4" class="form-label">Alamat</label>
                        <input type="text" class="form-control bg-light" id="exampleFormControlInput4" name="alamat" value="{{$u->alamat}}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jenis Bantuan</label>
                        <select class="form-control bg-light" name="jenis_bantuan">
                            <option value="">- Pilih Jenis Bantuan -</option>
                            <option value="Peduli" <?= $u->jenis_bantuan == 'Peduli' ? 'selected': '' ?>>Dumai Peduli</option>
                            <option value="Sehat" <?= $u->jenis_bantuan == 'Sehat' ? 'selected': '' ?>>Dumai Sehat</option>
                            <option value="Makmur" <?= $u->jenis_bantuan == 'Makmur' ? 'selected': '' ?>>Dumai Makmur</option>
                            <option value="Cerdas" <?= $u->jenis_bantuan == 'Cerdas' ? 'selected': '' ?>>Dumai Cerdas</option>
                            <option value="Taqwa" <?= $u->jenis_bantuan == 'Taqwa' ? 'selected': '' ?>>Dumai Taqwa</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput4" class="form-label">Kegunaan</label>
                        <textarea name="kegunaan" class="form-control" cols="30" rows="10">{{$u->kegunaan}}</textarea>
                    </div>
                    <div class="mb-5">
                        <button class="btn btn-success" type="submit">SIMPAN DATA MUSTAHIK</button>
                    </div>
                </div>
                <div class="col-4">
                    <div class="border p-3 text-center bg-light">
                        <div id="my_camera" class="border m-3 m-auto"></div>
                            <input type=button class="btn btn-success my-3" value="Take Snapshot" onClick="take_snapshot()">
                        <input type="hidden" name="image" class="image-tag">
                        <div id="results" style="width:220px;height:170px;" class="text-center border m-3 m-auto">
                        <img src="{{asset('upload/'.$u->photo)}}" alt="">
                        </div>
                        <i class="text-muted">Hasil Snapshot</i>
                    </div>
                </div>
            </div>
            @endforeach
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