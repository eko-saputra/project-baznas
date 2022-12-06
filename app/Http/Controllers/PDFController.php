<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mustahik;
use PDF;

class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generatePDF($id)
    {
        $mustahik = Mustahik::where('mustahik_id', $id)->get();

        $data = [
            'title' => 'Welcome to ItSolutionStuff.com',
            'date' => date('m/d/Y'),
            'mustahik' => $mustahik
        ];

        $pdf = PDF::loadView('myPDF', $data);

        return $pdf->stream('itsolutionstuff.pdf');
    }

    public function mustahikPDF()
    {
        $mustahik = Mustahik::get();

        $data = [
            'title' => 'Welcome to ItSolutionStuff.com',
            'date' => date('m/d/Y'),
            'mustahik' => $mustahik
        ];

        $pdf = PDF::loadView('mustahikPDF', $data);

        return $pdf->stream('mustahik.pdf');
    }
}
