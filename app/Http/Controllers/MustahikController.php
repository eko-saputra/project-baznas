<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Mustahik;
use App\Models\Validasi;
use App\Models\Survey;
use App\Models\PS;
use Illuminate\Http\Request;


class MustahikController extends Controller
{
    public function data_mustahik()
    {
        if (!Auth::user()) {
            return redirect()->intended('/login');
        } else {
            $data['auth'] = Auth::user();
            $data['mustahik'] = Mustahik::get();

            return view('admin/mustahik', $data);
        }
    }

    public function data_pengajuan()
    {
        if (!Auth::user()) {
            return redirect()->intended('/login');
        } else {
            $data['auth'] = Auth::user();
            $data['mustahik'] = Mustahik::where('status_keputusan', 'Pengajuan')->get();

            return view('admin/pengajuan', $data);
        }
    }

    public function data_pending()
    {
        if (!Auth::user()) {
            return redirect()->intended('/login');
        } else {
            $data['auth'] = Auth::user();
            $data['mustahik'] = Mustahik::where('status_keputusan', 'Pending')->get();

            return view('admin/pending', $data);
        }
    }

    public function data_survey()
    {
        if (!Auth::user()) {
            return redirect()->intended('/login');
        } else {
            $data['auth'] = Auth::user();
            $data['mustahik'] = Mustahik::where('status_keputusan', 'Survey')->get();
            // foreach ($data['mustahik'] as $m) {
            //     $data['survey'] = Survey::where('mustahik_id', $m->mustahik_id)->get();
            //     echo count($data['survey']);
            // }
            // exit;
            // echo count($data['mustahik']), exit;
            return view('admin/survey', $data);
        }
    }

    public function data_pleno()
    {
        if (!Auth::user()) {
            return redirect()->intended('/login');
        } else {
            $data['auth'] = Auth::user();
            $data['mustahik'] = Mustahik::where('status_keputusan', 'Pleno')->get();

            return view('admin/pleno', $data);
        }
    }

    public function data_disetujui()
    {
        if (!Auth::user()) {
            return redirect()->intended('/login');
        } else {
            $data['auth'] = Auth::user();
            $data['mustahik'] = Mustahik::where('status_keputusan', 'Disetujui')->get();

            return view('admin/disetujui', $data);
        }
    }

    public function data_ditolak()
    {
        if (!Auth::user()) {
            return redirect()->intended('/login');
        } else {
            $data['auth'] = Auth::user();
            $data['mustahik'] = Mustahik::where('status_keputusan', 'Ditolak')->get();

            return view('admin/ditolak', $data);
        }
    }

    public function tambah_mustahik()
    {
        if (!Auth::user()) {
            return redirect()->intended('/login');
        } else {
            $data['auth'] = Auth::user();

            return view('admin/tambah_mustahik', $data);
        }
    }

    public function simpan_mustahik(Request $request)
    {
        if (!Auth::user()) {
            return redirect()->intended('/login');
        } else {
            $data['auth'] = Auth::user();
            $request->validate([
                'no_kartu_kk' => 'required',
                'nama_kepala_keluarga' => 'required',
                'jumlah_tanggungan' => 'required',
                'pekerjaan' => 'required',
                'no_hp' => 'required',
                'jenis_kelamin' => 'required',
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

            date_default_timezone_set('Asia/Jakarta');
            $mustahik = new Mustahik([
                'no_kartu_kk' => $request->no_kartu_kk,
                'nama_kepala_kk' => $request->nama_kepala_keluarga,
                'jumlah_keluarga_tanggungan' => $request->jumlah_tanggungan,
                'pekerjaan' => $request->pekerjaan,
                'no_hp' => $request->no_hp,
                'jenis_kelamin' => $request->jenis_kelamin,
                'nama_penerima' => $request->nama_penerima,
                'nik_penerima' => $request->nik_penerima,
                'kecamatan' => $request->kecamatan,
                'kelurahan' => $request->kelurahan,
                'alamat' => $request->alamat,
                'jenis_bantuan' => $request->jenis_bantuan,
                'kegunaan' => $request->kegunaan,
                'status_keputusan' => 'Pengajuan',
                'tanggal_pengajuan' => date('Y-m-d H:i:s'),
                'photo' => $fileName,
                'updated_at' => date('Y-m-d H:i:s'),
                'created_at' => date('Y-m-d H:i:s'),
            ]);

            $mustahik->save();

            return redirect()->intended('/mustahik')->with('success', 'Data pengajuan mustahik berhasil ditambahkan!');
        }
    }

    public function edit_mustahik($id)
    {
        if (!Auth::user()) {
            return redirect()->intended('/login');
        } else {
            $data['auth'] = Auth::user();
            $data['mustahik'] = Mustahik::where('mustahik_id', $id)->get();

            return view('admin/edit_mustahik', $data);
        }
    }

    public function ubah_mustahik(Request $request)
    {
        if (!Auth::user()) {
            return redirect()->intended('/login');
        } else {
            $data['auth'] = Auth::user();
            $request->validate([
                'no_kartu_kk' => 'required',
                'nama_kepala_keluarga' => 'required',
                'jumlah_tanggungan' => 'required',
                'pekerjaan' => 'required',
                'no_hp' => 'required',
                'jenis_kelamin' => 'required',
                'nama_penerima' => 'required',
                'nik_penerima' => 'required',
                'kecamatan' => 'required',
                'kelurahan' => 'required',
                'alamat' => 'required',
                'jenis_bantuan' => 'required',
                'kegunaan' => 'required',
            ]);


            $img = $_POST['image'];
            if ($img != '') {
                $folderPath = 'upload/';

                $image_parts = explode(";base64,", $img);
                $image_type_aux = explode("image/", $image_parts[0]);

                $image_base64 = base64_decode($image_parts[1]);
                $fileName = uniqid() . '.png';

                $file = $folderPath . $fileName;
                file_put_contents($file, $image_base64);

                date_default_timezone_set('Asia/Jakarta');
                Mustahik::where('mustahik_id', $request->id)->update([
                    'no_kartu_kk' => $request->no_kartu_kk,
                    'nama_kepala_kk' => $request->nama_kepala_keluarga,
                    'jumlah_keluarga_tanggungan' => $request->jumlah_tanggungan,
                    'pekerjaan' => $request->pekerjaan,
                    'no_hp' => $request->no_hp,
                    'jenis_kelamin' => $request->jenis_kelamin,
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
                    'no_hp' => $request->no_hp,
                    'jenis_kelamin' => $request->jenis_kelamin,
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

    public function hapus_mustahik($id)
    {
        Mustahik::where('mustahik_id', $id)->delete();
        return redirect()->to('/mustahik')->with('success', 'Data mustahik berhasil dihapus!');
    }

    public function detail_proses($id)
    {
        if (!Auth::user()) {
            return redirect()->intended('/login');
        } else {
            $data['auth'] = Auth::user();
            $data['mustahik'] = Mustahik::where('mustahik_id', $id)->get();
            $data['validasi'] = Validasi::where('mustahik_id', $data['mustahik'][0]->mustahik_id)->where('user_id', Auth::user()->user_id)->get();
            $data['jum'] = count($data['validasi']);

            return view('admin/detail-proses', $data);
        }
    }

    public function detail_proses_pengajuan($id)
    {
        if (!Auth::user()) {
            return redirect()->intended('/login');
        } else {
            $data['auth'] = Auth::user();
            $data['mustahik'] = Mustahik::where('mustahik_id', $id)->get();
            $data['validasi'] = Validasi::where('mustahik_id', $data['mustahik'][0]->mustahik_id)->where('user_id', Auth::user()->user_id)->where('status', 'Survey')->get();
            $data['jum'] = count($data['validasi']);

            return view('admin/detail-proses-pengajuan', $data);
        }
    }

    public function detail_proses_survey($id)
    {
        if (!Auth::user()) {
            return redirect()->intended('/login');
        } else {
            $data['auth'] = Auth::user();
            $data['mustahik'] = Mustahik::where('mustahik_id', $id)->get();
            $data['validasi'] = Validasi::where('mustahik_id', $data['mustahik'][0]->mustahik_id)->where('user_id', Auth::user()->user_id)->where('status', 'Pleno')->get();
            $data['jum'] = count($data['validasi']);
            $data['survey'] = Survey::where('mustahik_id', $id)
                ->leftJoin('tb_user', 'tb_survey.user_id', '=', 'tb_user.user_id')
                ->get();

            return view('admin/detail-proses-survey', $data);
        }
    }

    public function detail_proses_pleno($id)
    {
        if (!Auth::user()) {
            return redirect()->intended('/login');
        } else {
            $data['auth'] = Auth::user();
            $data['mustahik'] = Mustahik::where('mustahik_id', $id)->get();
            $data['validasi'] = Validasi::where('mustahik_id', $data['mustahik'][0]->mustahik_id)->where('user_id', Auth::user()->user_id)->where('status', 'Disetujui')->orWhere('status', 'Pending')->where('user_id', Auth::user()->user_id)->get();
            $data['jum'] = count($data['validasi']);
            $data['survey'] = Survey::where('mustahik_id', $id)
                ->leftJoin('tb_user', 'tb_survey.user_id', '=', 'tb_user.user_id')
                ->get();

            return view('admin/detail-proses-pleno', $data);
        }
    }

    public function detail_disetujui($id)
    {
        if (!Auth::user()) {
            return redirect()->intended('/login');
        } else {
            $data['auth'] = Auth::user();
            $data['mustahik'] = Mustahik::where('mustahik_id', $id)->get();
            $data['validasi'] = Mustahik::where('mustahik_id', $data['mustahik'][0]->mustahik_id)->get();
            $data['jum'] = count($data['validasi']);
            $data['survey'] = Survey::where('mustahik_id', $id)
                ->leftJoin('tb_user', 'tb_survey.user_id', '=', 'tb_user.user_id')
                ->get();

            return view('admin/detail-disetujui', $data);
        }
    }

    public function detail_pending($id)
    {
        if (!Auth::user()) {
            return redirect()->intended('/login');
        } else {
            $data['auth'] = Auth::user();
            $data['mustahik'] = Mustahik::where('mustahik_id', $id)->get();
            $data['validasi'] = Mustahik::where('mustahik_id', $data['mustahik'][0]->mustahik_id)->get();
            $data['jum'] = count($data['validasi']);
            $data['survey'] = Survey::where('mustahik_id', $id)
                ->leftJoin('tb_user', 'tb_survey.user_id', '=', 'tb_user.user_id')
                ->get();

            return view('admin/detail-pending', $data);
        }
    }

    public function detail_ditolak($id)
    {
        if (!Auth::user()) {
            return redirect()->intended('/login');
        } else {
            $data['auth'] = Auth::user();
            $data['mustahik'] = Mustahik::where('mustahik_id', $id)->get();
            $data['validasi'] = Mustahik::where('mustahik_id', $data['mustahik'][0]->mustahik_id)->get();
            $data['jum'] = count($data['validasi']);
            $data['survey'] = Validasi::where('mustahik_id', $data['mustahik'][0]->mustahik_id)->where('status', 'Survey')->get();
            $data['pleno'] = Validasi::where('mustahik_id', $data['mustahik'][0]->mustahik_id)->where('status', 'Pleno')->get();
            $data['survey'] = Survey::where('mustahik_id', $id)
                ->leftJoin('tb_user', 'tb_survey.user_id', '=', 'tb_user.user_id')
                ->get();

            return view('admin/detail-ditolak', $data);
        }
    }

    public function detail_proses_pending($id)
    {
        if (!Auth::user()) {
            return redirect()->intended('/login');
        } else {
            $data['auth'] = Auth::user();
            $data['mustahik'] = Mustahik::where('mustahik_id', $id)->get();
            $data['validasi'] = Validasi::where('mustahik_id', $data['mustahik'][0]->mustahik_id)->where('user_id', Auth::user()->user_id)->where('status', 'Disetujui')->get();
            $data['jum'] = count($data['validasi']);
            $data['survey'] = Survey::where('mustahik_id', $id)
                ->leftJoin('tb_user', 'tb_survey.user_id', '=', 'tb_user.user_id')
                ->get();

            return view('admin/detail-proses-pending', $data);
        }
    }

    public function dokumentasi_survey($id)
    {
        if (!Auth::user()) {
            return redirect()->intended('/login');
        } else {
            $data['auth'] = Auth::user();
            $data['mustahik'] = Mustahik::where('mustahik_id', $id)->get();
            $data['survey'] = Survey::where('mustahik_id', $id)
                ->leftJoin('tb_user', 'tb_survey.user_id', '=', 'tb_user.user_id')
                ->get();

            // $cek_petugas = PS::where('survey_id', $data['survey'][0]->survey_id)->get();
            // $data['cek_petugas'] = count($cek_petugas);

            return view('admin/dokumentasi-survey', $data);
        }
    }

    public function simpan_survey(Request $request)
    {
        if (!Auth::user()) {
            return redirect()->intended('/login');
        } else {
            $data['auth'] = Auth::user();

            $request->validate([
                'petugas_survey' => 'required',
                'photo' => 'required|image|mimes:png,jpg,jpeg,webp|max:4096',
                'keterangan' => 'required',
            ]);

            $imageName = $request->file('photo')->store('dokumentasi', 'public');

            $survey = new Survey([
                'user_id' => $request->user_id,
                'mustahik_id' => $request->mustahik_id,
                'photo' => $imageName,
                'keterangan' => $request->keterangan,
                'petugas_survey' => $request->petugas_survey,
            ]);

            $survey->save();

            // $cek = Survey::where('user_id', $request->user_id)->where('mustahik_id', $request->mustahik_id)->get();

            // if (count($cek) > 0) {
            //     $petugas = new PS([
            //         'survey_id' => $cek[0]->survey_id,
            //         'nama_PS' => $request->petugas_survey,
            //     ]);

            //     $petugas->save();
            // }

            return redirect()->intended('/dokumentasi-survey/' . $request->mustahik_id)->with('success', 'Data dokumentasi survey ditambahkan!');
        }
    }

    public function hapus_photo_survey($survey_id, $mustahik_id)
    {
        if (!Auth::user()) {
            return redirect()->intended('/login');
        } else {
            $data['auth'] = Auth::user();

            $cek = Survey::where('survey_id', $survey_id)->get();

            if (file_exists(public_path() . '/storage/' . $cek[0]->photo)) {
                unlink(public_path() . '/storage/' . $cek[0]->photo);
            }

            Survey::where('survey_id', $survey_id)->delete();
            return redirect()->to('/dokumentasi-survey/' . $mustahik_id)->with('success', 'Data user berhasil dihapus!');
        }
    }

    public function simpan_keputusan(Request $request)
    {
        if (!Auth::user()) {
            return redirect()->intended('/login');
        } else {
            $data['auth'] = Auth::user();
            if ($request->keputusan == 'Survey') {

                $validasi = new Validasi([
                    'user_id' => Auth::user()->user_id,
                    'mustahik_id' => $request->id,
                    'status' => $request->keputusan,
                ]);

                $validasi->save();

                $jm = Validasi::where('mustahik_id', $request->id)->where('status', 'Survey')->get();

                if (count($jm) == 2) {
                    Mustahik::where('mustahik_id', $request->id)->update([
                        'status_keputusan' => 'Survey',
                    ]);
                }
                return redirect()->intended('/pengajuan')->with('success', 'Data mustahik berhasil diproses!');
            } else if ($request->keputusan == 'Pleno') {

                $validasi = new Validasi([
                    'user_id' => Auth::user()->user_id,
                    'mustahik_id' => $request->id,
                    'status' => $request->keputusan,
                ]);

                $validasi->save();

                $jm = Validasi::where('mustahik_id', $request->id)->where('status', 'Pleno')->get();

                if (count($jm) == 2) {
                    Mustahik::where('mustahik_id', $request->id)->update([
                        'status_keputusan' => 'Pleno',
                    ]);
                }
                return redirect()->intended('/survey')->with('success', 'Data mustahik berhasil diproses!');
            } else if ($request->keputusan == 'Pending') {

                $validasi = new Validasi([
                    'user_id' => Auth::user()->user_id,
                    'mustahik_id' => $request->id,
                    'status' => $request->keputusan,
                ]);

                $validasi->save();

                $jm = Validasi::where('mustahik_id', $request->id)->where('status', 'Pending')->get();

                if (count($jm) == 3) {
                    Mustahik::where('mustahik_id', $request->id)->update([
                        'status_keputusan' => 'Pending',
                    ]);
                } else {
                    $cek = Mustahik::where('mustahik_id', $request->id)->get();
                    if ($cek[0]->pertimbangan_saran == null) {
                        Mustahik::where('mustahik_id', $request->id)->update([
                            'pertimbangan_saran' => $request->pertimbangan,
                        ]);
                    }
                }
                return redirect()->intended('/pleno')->with('success', 'Data mustahik berhasil diproses!');
            } else if ($request->keputusan == 'Disetujui') {

                $validasi = new Validasi([
                    'user_id' => Auth::user()->user_id,
                    'mustahik_id' => $request->id,
                    'status' => $request->keputusan,
                ]);

                $validasi->save();

                $jm = Validasi::where('mustahik_id', $request->id)->where('status', 'Disetujui')->get();

                if (count($jm) == 3) {
                    Mustahik::where('mustahik_id', $request->id)->update([
                        'status_keputusan' => 'Disetujui',
                        'pertimbangan_saran' => $request->pertimbangan,
                        'dana_yang_disetujui' => $request->dana,
                    ]);
                } else {
                    $cek = Mustahik::where('mustahik_id', $request->id)->get();
                    if ($cek[0]->dana_yang_disetujui == null) {
                        Mustahik::where('mustahik_id', $request->id)->update([
                            'pertimbangan_saran' => $request->pertimbangan,
                            'dana_yang_disetujui' => $request->dana,
                        ]);
                    }
                }
                return redirect()->intended('/pleno')->with('success', 'Data mustahik berhasil diproses!');
            } else if ($request->keputusan == 'Ditolak') {
                $validasi = new Validasi([
                    'user_id' => Auth::user()->user_id,
                    'mustahik_id' => $request->id,
                    'status' => $request->keputusan,
                ]);

                $validasi->save();

                Mustahik::where('mustahik_id', $request->id)->update([
                    'status_keputusan' => 'Ditolak',
                    'pertimbangan_saran' => $request->pertimbangan,
                ]);
                return redirect()->intended('/ditolak')->with('success', 'Data mustahik berhasil diproses!');
            }
        }
    }
}
