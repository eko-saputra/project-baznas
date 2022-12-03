<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\MustahikExport;
use App\Exports\MustahikExport_staff;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Mustahik;
use Mockery\Matcher\MustBe;

class ExcelController extends Controller
{
    /**
     * @return \Illuminate\Support\Collection
     */
    // public function index()
    // {
    //     $mustahik = Mustahik::get();

    //     return view('home', compact('mustahik'));
    // }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function export($id)
    {
        return Excel::download(new MustahikExport($id), 'mustahik.xlsx');
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function export_staff()
    {
        return Excel::download(new MustahikExport_staff, 'mustahik.xlsx');
    }
}
