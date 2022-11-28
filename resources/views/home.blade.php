@extends('layout')

@section('content')
        <div class="container shadow mb-3 pb-3">
          <img src="{{asset('images/banner1.png')}}" class="mb-3 mt-3" width="100%">
          {{-- <h6 class="py-2 bg-dark text-muted text-center">List Data <i>MUSTAHIK</i></h6> --}}
          <?php 
                                function rupiah($angka){
                                    
                                    $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
                                    return $hasil_rupiah;
                                
                                }
                                ?>
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
                <td>{{$u->kelurahan}}</td>
                <?php 
                                    if($u->status_keputusan == 'Pending'){
                                        $bg = 'warning';
                                    } else if($u->status_keputusan == 'Disetujui'){
                                        $bg = 'success';
                                    } else if($u->status_keputusan == 'Ditolak'){
                                        $bg = 'danger';
                                    }
                                ?>
                <td><span class="badge bg-{{$bg}}">{{$u->status_keputusan}}</span></td>
                <td><?=rupiah($u->dana_yang_disetujui);?></td>
                <td>{{$u->jenis_bantuan}}</td>
                <td>{{$u->tanggal_pengajuan}}</td>
                <td class="text-center"><a href="" class="btn btn-warning text-dark">Detail</a></td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
@endsection