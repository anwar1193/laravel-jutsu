<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\ProductDataTable;

class DtableController extends Controller
{
    public function index(ProductDataTable $dataTable)
    {
        return $dataTable->render('dataTable/index');
    }
}
