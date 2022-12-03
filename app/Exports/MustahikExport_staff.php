<?php

namespace App\Exports;

use App\Models\Mustahik;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MustahikExport_staff implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Mustahik::select("no_kartu_kk", "nama_kepala_kk", "jumlah_keluarga_tanggungan", "pekerjaan", "nama_penerima", "nik_penerima", "kecamatan", "kelurahan", "alamat", "jenis_bantuan", "status_keputusan", "tanggal_pengajuan", "pertimbangan_saran", "dana_yang_disetujui", "kegunaan")->get();
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function headings(): array
    {
        return ["No KK", "Nama Kepala Keluarga", "Jumlah Keluarga Tanggunan", "Pekerjaan", "Nama Penerima", "NIK Penerima", "Kecamatan", "Kelurahan", "Alamat", "Jenis Bantuan", "Status Keputusan", "Tanggal Pengajuan", "Pertimbangan Saran", "Dana Yang Disetujui", "Kegunaan"];
    }
}
