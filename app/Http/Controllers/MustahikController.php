<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Mustahik;
use Illuminate\Http\Request;


class MustahikController extends Controller
{
    public function data_mustahik() {
        if(!Auth::user())
        {
            return redirect()->intended('/login');
        } else {
            $data['role'] = Auth::user()->role;
            $data['name'] = Auth::user()->name;
            $data['mustahik'] = Mustahik::get();

            return view('admin/mustahik',$data);
        }
    }

    public function data_pending() {
        if(!Auth::user())
        {
            return redirect()->intended('/login');
        } else {
            $data['role'] = Auth::user()->role;
            $data['name'] = Auth::user()->name;
            $data['mustahik'] = Mustahik::where('status_keputusan','Pending')->get();

            return view('admin/pending',$data);
        }
    }

    public function data_disetujui() {
        if(!Auth::user())
        {
            return redirect()->intended('/login');
        } else {
            $data['role'] = Auth::user()->role;
            $data['name'] = Auth::user()->name;
            $data['mustahik'] = Mustahik::where('status_keputusan','Disetujui')->get();

            return view('admin/disetujui',$data);
        }
    }

    public function data_ditolak() {
        if(!Auth::user())
        {
            return redirect()->intended('/login');
        } else {
            $data['role'] = Auth::user()->role;
            $data['name'] = Auth::user()->name;
            $data['mustahik'] = Mustahik::where('status_keputusan','Ditolak')->get();

            return view('admin/ditolak',$data);
        }
    }

    public function tambah_mustahik() {
        if(!Auth::user())
        {
            return redirect()->intended('/login');
        } else {
            $data['role'] = Auth::user()->role;
            $data['name'] = Auth::user()->name;

            return view('admin/tambah_mustahik',$data);
        }
    }

    public function simpan_mustahik(Request $request) {
        if(!Auth::user())
        {
            return redirect()->intended('/login');
        } else {
            $data['role'] = Auth::user()->role;
            $data['name'] = Auth::user()->name;
            $request->validate([
                'no_kartu_kk' => 'required',
                'nama_kepala_keluarga' => 'required',
                'jumlah_tanggungan' => 'required',
                'pekerjaan' => 'required',
                'nama_penerima' => 'required',
                'nik_penerima' => 'required',
                'kecamatan' => 'required',
                'kelurahan' => 'required',
                'alamat' => 'required',
                'jenis_bantuan' => 'required',
                'kegunaan' => 'required',
                'image' => 'required',
            ]);

            
            $img = $_POST['image'];
            $folderPath = 'upload/';
            
            $image_parts = explode(";base64,", $img);
            $image_type_aux = explode("image/", $image_parts[0]);
            // $image_type = $image_type_aux[1];
            
            $image_base64 = base64_decode($image_parts[1]);
            $fileName = uniqid() . '.png';
            
            $file = $folderPath . $fileName;
            file_put_contents($file, $image_base64);


            $mustahik = new Mustahik([
                'no_kartu_kk' => $request->no_kartu_kk,
                'nama_kepala_kk' => $request->nama_kepala_keluarga,
                'jumlah_keluarga_tanggungan' => $request->jumlah_tanggungan,
                'pekerjaan' => $request->pekerjaan,
                'nama_penerima' => $request->nama_penerima,
                'nik_penerima' => $request->nik_penerima,
                'kecamatan' => $request->kecamatan,
                'kelurahan' => $request->kelurahan,
                'alamat' => $request->alamat,
                'jenis_bantuan' => $request->jenis_bantuan,
                'kegunaan' => $request->kegunaan,
                'status_keputusan' => 'Pending',
                'tanggal_pengajuan' => date('d-m-Y H:i:s'),
                'photo' => $fileName,
                'updated_at' => date('d-m-Y H:i:s'),
                'created_at' => date('d-m-Y H:i:s'),
            ]);
    
            $mustahik->save();

            return redirect()->intended('/mustahik')->with('success', 'Data mustahik berhasil ditambahkan!');
        }
    }

    public function edit_mustahik($id){
        if(!Auth::user())
        {
            return redirect()->intended('/login');
        } else {
            $data['role'] = Auth::user()->role;
            $data['name'] = Auth::user()->name;
            $data['mustahik'] = Mustahik::where('mustahik_id',$id)->get();

            return view('admin/edit_mustahik',$data);
        }
    }

    public function ubah_mustahik(Request $request) {
        if(!Auth::user())
        {
            return redirect()->intended('/login');
        } else {
            $data['role'] = Auth::user()->role;
            $data['name'] = Auth::user()->name;
            $request->validate([
                'no_kartu_kk' => 'required',
                'nama_kepala_keluarga' => 'required',
                'jumlah_tanggungan' => 'required',
                'pekerjaan' => 'required',
                'nama_penerima' => 'required',
                'nik_penerima' => 'required',
                'kecamatan' => 'required',
                'kelurahan' => 'required',
                'alamat' => 'required',
                'jenis_bantuan' => 'required',
                'kegunaan' => 'required',
            ]);

            
            $img = $_POST['image'];
            if($img != ''){
            $folderPath = 'upload/';
            
            $image_parts = explode(";base64,", $img);
            $image_type_aux = explode("image/", $image_parts[0]);
            
            $image_base64 = base64_decode($image_parts[1]);
            $fileName = uniqid() . '.png';
            
            $file = $folderPath . $fileName;
            file_put_contents($file, $image_base64);


            Mustahik::where('mustahik_id', $request->id)->update([
                'no_kartu_kk' => $request->no_kartu_kk,
                'nama_kepala_kk' => $request->nama_kepala_keluarga,
                'jumlah_keluarga_tanggungan' => $request->jumlah_tanggungan,
                'pekerjaan' => $request->pekerjaan,
                'nama_penerima' => $request->nama_penerima,
                'nik_penerima' => $request->nik_penerima,
                'kecamatan' => $request->kecamatan,
                'kelurahan' => $request->kelurahan,
                'alamat' => $request->alamat,
                'jenis_bantuan' => $request->jenis_bantuan,
                'kegunaan' => $request->kegunaan,
                'photo' => $fileName,
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        } else {
            Mustahik::where('mustahik_id', $request->id)->update([
                'no_kartu_kk' => $request->no_kartu_kk,
                'nama_kepala_kk' => $request->nama_kepala_keluarga,
                'jumlah_keluarga_tanggungan' => $request->jumlah_tanggungan,
                'pekerjaan' => $request->pekerjaan,
                'nama_penerima' => $request->nama_penerima,
                'nik_penerima' => $request->nik_penerima,
                'kecamatan' => $request->kecamatan,
                'kelurahan' => $request->kelurahan,
                'alamat' => $request->alamat,
                'jenis_bantuan' => $request->jenis_bantuan,
                'kegunaan' => $request->kegunaan,
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }

            return redirect()->intended('/mustahik')->with('success', 'Data mustahik berhasil diubah!');
        }
    }

    public function hapus_mustahik($id){
        Mustahik::where('mustahik_id', $id)->delete();
        return redirect()->to('/mustahik')->with('success', 'Data mustahik berhasil dihapus!');
    }

    public function detail_proses($id){
        if(!Auth::user())
        {
            return redirect()->intended('/login');
        } else {
            $data['role'] = Auth::user()->role;
            $data['name'] = Auth::user()->name;
            $data['mustahik'] = Mustahik::where('mustahik_id',$id)->get();

            return view('admin/detail-proses',$data);
        }
    }

    public function simpan_keputusan(Request $request){
        if(!Auth::user())
        {
            return redirect()->intended('/login');
        } else {
            $data['role'] = Auth::user()->role;
            $data['name'] = Auth::user()->name;

            if($request->keputusan == 'disetujui')
            {
            $request->validate([
                'dana' => 'required',
                'pertimbangan' => 'required',
            ]);
            } else if($request->keputusan == 'ditolak') {
                $request->validate([
                    'pertimbangan' => 'required',
                ]);
            }

            Mustahik::where('mustahik_id', $request->id)->update([
                'status_keputusan' => $request->keputusan,
                'pertimbangan_saran' => $request->pertimbangan,
                'dana_yang_disetujui' => $request->dana,
            ]);

            return redirect()->intended('/pending')->with('success', 'Data mustahik berhasil diproses!');
        }
    }
}
