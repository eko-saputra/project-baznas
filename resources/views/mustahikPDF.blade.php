<!DOCTYPE html>
<html>
<head>
    <title>Data Mustahik</title>
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> --}}
<style>
    .tabel {
        width: 100%;
        margin: auto;
        border: 1px solid gray;
        font-size: 10px;
    }

    .tabel td {
        padding: 2px;
        border-bottom: 1px solid gray;
    }
</style>
</head>
<body>
    <center>
        <img src="images/logo.png" width='50'>
        <h3>DATA MUSTAHIK</h3>
    <h6>BAZNAS KOTA DUMAI</h6>
    </center>
    <hr>
    <table class="tabel">
        <thead>
         <tr class="bg-secondary text-light">
           <th>Nama</th>
           <th>NIK</th>
           <th>No HP</th>
           <th>Status</th>
           <th align="center">Saran</th>
           <th>Dana</th>
           <th>Tanggal</th>
       </tr>
        </thead>
         <tbody>
           @foreach($mustahik as $u)
         <tr>
             <td>{{$u->nama_penerima}}</td>
             <td>{{$u->nik_penerima}}</td>
             <td>{{$u->no_hp}}</td>
             <td>{{$u->status_keputusan}}</td>
             <td>{{$u->pertimbangan_saran}}</td>
             <td>{{$u->dana_yang_disetujui}}</td>
             <td>{{$u->tanggal_pengajuan}}</td>
         </tr>
         @endforeach
         </tbody>
       </table>
    <p align="center" style="margin-top: 50px;"><u>Baznas Kota Dumai</u></p>
 </body>
</html>