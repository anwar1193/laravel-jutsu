<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use PDF;

class ExportPdfController extends Controller
{
    public function index()
    {
       $this->authorize('admin');
       $data['data'] = Employee::orderBy('id', 'ASC')->get();
       $data['title'] = 'Export PDF';

       return view('exportPdf.index', $data);
    }

    public function cetak_pdf()
    {
        $this->authorize('admin');
        $data['data'] = Employee::orderBy('id', 'ASC')->get();
        $data['title'] = 'Report PDF';

        $pdf = PDF::loadView('exportPdf.pdf', $data);
        return $pdf->download('report.pdf');
    }
}
 