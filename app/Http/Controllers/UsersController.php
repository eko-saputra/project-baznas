<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function data_user() {
        if(!Auth::user())
        {
            return redirect()->intended('/login');
        } else {
            $data['role'] = Auth::user()->role;
            $data['name'] = Auth::user()->name;
            $data['users'] = User::get();

            return view('admin/users',$data);
        }
    }

    public function tambah_user() {
        if(!Auth::user())
        {
            return redirect()->intended('/login');
        } else {
            $data['role'] = Auth::user()->role;
            $data['name'] = Auth::user()->name;

            return view('admin/tambah_user',$data);
        }
    }

    public function simpan_user(Request $request) {
        if(!Auth::user())
        {
            return redirect()->intended('/login');
        } else {
            $data['role'] = Auth::user()->role;
            $data['name'] = Auth::user()->name;
            $request->validate([
                'nama' => 'required',
                'username' => 'required',
                'password' => 'required',
            ]);

            $user = new User([
                'name' => $request->nama,
                'username' => $request->username,
                'password' => $request->password,
                'role' => 'staff'
            ]);
    
            $user->save();

            return redirect()->intended('/users')->with('success', 'Data user berhasil ditambahkan!');
        }
    }

    public function edit_user($id) {
        if(!Auth::user())
        {
            return redirect()->intended('/login');
        } else {
            $data['role'] = Auth::user()->role;
            $data['name'] = Auth::user()->name;
            $data['users'] = User::where('user_id',$id)->get();

            return view('admin/edit_user',$data);
        }
    }

    public function ubah_user(Request $request) {
        if(!Auth::user())
        {
            return redirect()->intended('/login');
        } else {
            $data['role'] = Auth::user()->role;
            $data['name'] = Auth::user()->name;
            $request->validate([
                'nama' => 'required',
                'username' => 'required',
            ]);

            if($request->password == '') {
                User::where('user_id', $request->id)->update([
                    'name' => $request->nama,
                    'username' => $request->username,
                ]);
            } else {
                User::where('user_id', $request->id)->update([
                    'name' => $request->nama,
                    'username' => $request->username,
                    'password' => Hash::make($request->password),
                ]);
            }

            return redirect()->intended('/users')->with('success', 'Data user berhasil diubah!');
        }
    }

    public function hapus_user($id){
        User::where('user_id', $id)->delete();
        return redirect()->to('/users')->with('success', 'Data user berhasil dihapus!');
    }

    public function password(){
        if(!Auth::user())
        {
            return redirect()->intended('/login');
        } else {
            $data['role'] = Auth::user()->role;
            $data['name'] = Auth::user()->name;

            return view('admin/password',$data);
        }
    }

    public function ubah_password(Request $request)
    {
        $request->validate([
            'old_password' => 'required|current_password',
            'new_password' => 'required|confirmed',
        ]);
        $user = User::find(Auth::id());
        $user->password = Hash::make($request->new_password);
        $user->save();
        $request->session()->regenerate();
        return back()->with('success', 'Password changed!');
    }
}