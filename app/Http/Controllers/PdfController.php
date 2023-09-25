<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class PdfController extends Controller
{
    public function export_pdf(){
        $pdf =PDF::loadView('pdf.invoice', $data);
        return $pdf ->download('invoice.pdf');
    }
}
