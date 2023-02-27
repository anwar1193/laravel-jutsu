<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class CrudStandarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('admin'); // validasi gate (hanya admin yang bisa akses)
        return view('crudStandar.index', [
            'title' => 'CRUD Standar',
            'data' => Employee::orderBy('id', 'ASC')->get()
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
        $religion = ['Islam', 'Kristen', 'Katholik', 'Hidhu', 'Budha'];
        return view('crudStandar.create', [
            'title' => 'CRUD Standar Create',
            'religion' => $religion
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

        // Contoh Validasi Biasa
        $validateData = $request->validate([
            'emp_name' => 'required|max:255',
            'emp_religion' => 'required',
            'emp_birthdate' => 'required',
            'emp_adress' => 'required'
        ]);

        // $validateData['emp_religion'] = $request->emp_religion;
        $validateData['emp_gender'] = $request->emp_gender;

        Employee::create($validateData);

        return redirect('/crud_standar')->with('success', 'Data Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('admin'); // validasi gate (hanya admin yang bisa akses)

        $employee = Employee::find($id);
        $religion = ['Islam', 'Kristen', 'Katholik', 'Hidhu', 'Budha'];
        return view('crudStandar.edit', [
            'employee' => $employee,
            'title' => 'CRUD Standar Edit',
            'religion' => $religion
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->authorize('admin'); // validasi gate (hanya admin yang bisa akses)

        // Contoh Validasi Biasa
        $validateData = $request->validate([
            'emp_name' => 'required|max:255',
            'emp_religion' => 'required',
            'emp_birthdate' => 'required',
            'emp_adress' => 'required'
        ]);

        // $validateData['emp_religion'] = $request->emp_religion;
        $validateData['emp_gender'] = $request->emp_gender;

        Employee::where('id', $id)->update($validateData);

        return redirect('/crud_standar')->with('success', 'Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('admin'); // validasi gate (hanya admin yang bisa akses)

        Employee::destroy($id);
        return redirect('/crud_standar')->with('success', 'Data Berhasil Dihapus');
    }

    // Halaman Custom
    public function custom()
    {
        $this->authorize('admin'); // validasi gate (hanya admin yang bisa akses)
        
        return view('crudStandar.custom', [
            'title' => 'Halaman Custom'
        ]);
    }

}
