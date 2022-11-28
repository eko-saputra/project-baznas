<?php

namespace App\Http\Controllers;
use App\Models\Mustahik;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $data['mustahik'] = Mustahik::get();

        return view('home',$data);
    }
}
