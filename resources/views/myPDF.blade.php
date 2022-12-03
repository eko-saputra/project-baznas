<!DOCTYPE html>
<html>
<head>
    <title>Detail Profil - Data Mustahik</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<style>
    .tabel {
        width: 100%;
        margin: auto;
        border: 1px solid gray;
    }

    .tabel td {
        padding: 5px;
        border: 1px solid gray;
    }

    .photo {
        border: 2px solid gray;
        border-radius: 10px;
        padding: 5px;
        width: 70%;
    }
</style>
</head>
<body>
    <table class="tabel">
        <tr>
            <td colspan="3" align="center"><b><h3>DETAIL PROFIL</h3></b><i>Detail Data Mustahik</i></td>
        </tr>
        @foreach($mustahik as $u)
        <tr>
            <td width="40%"><b>No. Kartu Keluarga</b></td>
            <td width="30%" colspan="2"><b>{{ $u->no_kartu_kk }}</b></td>
            {{-- <td rowspan="6" width="30%" valign="middle" align="center">
                <img src="upload/{{$u->photo}}" class="photo">
            </td> --}}
        </tr>
        <tr>
            <td>Nama Kepala Keluarga</td>
            <td colspan="2">{{ $u->nama_kepala_kk }}</td>
        </tr>
        <tr>
            <td>Jumlah Keluarga Tanggungan</td>
            <td colspan="2">{{ $u->jumlah_keluarga_tanggungan }}</td>
        </tr>
        <tr>
            <td>Pekerjaan Kepala Keluarga</td>
            <td colspan="2">{{ $u->pekerjaan }}</td>
        </tr>
        <tr>
            <td>No HP</td>
            <td colspan="2">{{ $u->no_hp }}</td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td colspan="2">{{$u->jenis_kelamin }}</td>
        </tr>
        <tr>
            <td colspan="3">&nbsp;</td>
        </tr>
        <tr>
            <td>Nama Penerima</td>
            <td colspan="2">{{ $u->nama_penerima }}</td>
        </tr>
        <tr>
            <td>NIK Penerima</td>
            <td colspan="2">{{ $u->nik_penerima }}</td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td colspan="2">{{ $u->alamat }}</td>
        </tr>
        <tr>
            <td colspan="3">&nbsp;</td>
        </tr>

        <tr>
            <td>Tanggal Proposal</td>
            <td colspan="2">{{ $u->tanggal_pengajuan }}</td>
        </tr>

        <tr>
            <td>Pertimbangan</td>
            <td colspan="2">{{ $u->pertimbangan_saran }}</td>
        </tr>

        <tr>
            <td>Hasil Keputusan</td>
            <td colspan="2">{{ $u->status_keputusan }}</td>
        </tr>

        <tr>
            <td>Dana Yang Disetujui</td>
                                <?php 
                                function rupiah($angka){
                                    
                                    $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
                                    return $hasil_rupiah;
                                
                                }
                                ?>
            <td colspan="2"><?=rupiah($u->dana_yang_disetujui);?></td>
        </tr>

        <tr>
            <td>Jenis Bantuan</td>
            <td colspan="2">Dumai {{ $u->jenis_bantuan }}</td>
        </tr>

        <tr>
            <td>Alamat</td>
            <td colspan="2">{{ $u->alamat }}</td>
        </tr>

        <tr>
            <td>Kegunaan</td>
            <td colspan="2">{{ $u->kegunaan }}</td>
        </tr>
        @endforeach
    </table>
    <p align="center" style="margin-top: 50px;"><u>Baznas Kota Dumai</u></p>
 </body>
</html>