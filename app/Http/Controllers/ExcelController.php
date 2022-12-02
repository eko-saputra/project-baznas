<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\MustahikExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Mustahik;
use Mockery\Matcher\MustBe;

class ExcelController extends Controller
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function index()
    {
        $mustahik = Mustahik::get();

        return view('home', compact('mustahik'));
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function export()
    {
        return Excel::download(new MustahikExport, 'mustahik.xlsx');
    }
}
