<!DOCTYPE html>
<html>
<head>
    <title>Laravel 9 Generate PDF Example - ItSolutionStuff.com</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <table class="table table-bordered">
        <tr>
            <th colspan="2" class="text-center">DETAIL PROFIL</th>
        </tr>
        @foreach($mustahik as $u)
        <tr>
            <td>No. Kartu Keluarga</td>
            <td>{{ $u->no_kartu_kk }}</td>
        </tr>
        <tr>
            <td>Nama Kepala Keluarga</td>
            <td>{{ $u->nama_kepala_kk }}</td>
        </tr>
        <tr>
            <td>Jumlah Keluarga Tanggungan</td>
            <td>{{ $u->jumlah_keluarga_tanggungan }}</td>
        </tr>
        <tr>
            <td>Pekerjaan Kepala Keluarga</td>
            <td>{{ $u->pekerjaan }}</td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
            <td>Nama Penerima</td>
            <td>{{ $u->nama_penerima }}</td>
        </tr>
        <tr>
            <td>NIK Penerima</td>
            <td>{{ $u->nik_penerima }}</td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>{{ $u->alamat }}</td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;</td>
        </tr>

        <tr>
            <td>Tanggal Proposal</td>
            <td>{{ $u->tanggal_pengajuan }}</td>
        </tr>

        <tr>
            <td>Pertimbangan</td>
            <td>{{ $u->pertimbangan_saran }}</td>
        </tr>

        <tr>
            <td>Hasil Keputusan</td>
            <td>{{ $u->status_keputusan }}</td>
        </tr>

        <tr>
            <td>Dana Yang Disetujui</td>
            <td>{{ $u->dana_yang_disetujui }}</td>
        </tr>

        <tr>
            <td>Jenis Bantuan</td>
            <td>{{ $u->jenis_bantuan }}</td>
        </tr>

        <tr>
            <td>Alamat</td>
            <td>{{ $u->alamat }}</td>
        </tr>

        <tr>
            <td>Kegunaan</td>
            <td>{{ $u->kegunaan }}</td>
        </tr>

        <tr>
            <td>Alamat</td>
            <td>{{ $u->alamat }}</td>
        </tr>
        @endforeach
    </table>
  
</body>
</html>