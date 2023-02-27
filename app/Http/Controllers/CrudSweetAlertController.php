<?php

namespace App\Http\Controllers;

use App\Models\Province;
use Illuminate\Http\Request;

class CrudSweetAlertController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('admin'); // validasi gate (hanya admin yang bisa akses)
        return view('crudSweetAlert.index', [
            'title' => 'CRUD Sweet Alert',
            // 'data' => Province::all()
            'data' => Province::orderBy('province_name', 'ASC')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('admin'); // validasi gate (hanya admin yang bisa akses)
        return view('crudSweetAlert.create', [
            'title' => 'CRUD Sweet Alert (Tambah Data)'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('admin'); // validasi gate (hanya admin yang bisa akses)
        $validateData = $request->validate([
            'province_name' => 'required|max:255|min:3|unique:provinces,province_name'
        ]);

        Province::create($validateData);
        return redirect('/crud_sweetalert')->with('success', 'Data Telah Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Province  $province
     * @return \Illuminate\Http\Response
     */
    public function show(Province $province)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Province  $province
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('admin'); // validasi gate (hanya admin yang bisa akses)
        $data = Province::find($id);
        return view('crudSweetAlert.edit', [
            'title' => 'CRUD Sweet Alert (Update Data)',
            'data' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Province  $province
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->authorize('admin'); // validasi gate (hanya admin yang bisa akses)
        $validateData = $request->validate([
            'province_name' => 'required|max:255|min:3|unique:provinces,province_name'
        ]);

        Province::where('id', $id)->update($validateData);
        return redirect('/crud_sweetalert')->with('success', 'Data Telah Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Province  $province
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('admin'); // validasi gate (hanya admin yang bisa akses)
        Province::destroy($id);
        return redirect('/crud_sweetalert')->with('success', 'Data Telah Dihapus');
    }
}
