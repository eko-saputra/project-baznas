<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index() {
        if(!Auth::user())
        {
            return redirect()->intended('/login');
        } else {
            $data['role'] = Auth::user()->role;
            $data['name'] = Auth::user()->name;


            return view('admin/dashboard',$data);
        }
    }
}
