<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class AutoRefreshController extends Controller
{

    public function index()
    {
        $this->authorize('admin'); // validasi gate (hanya admin yang bisa akses)
        return view('autoRefresh.index', [
            'title' => 'Auto Refresh'
        ]);
    }

    public function data()
    {
        $data['employee'] = Employee::orderBy('id', 'ASC')->get();

        return view('autoRefresh.data', $data);
    }

}
