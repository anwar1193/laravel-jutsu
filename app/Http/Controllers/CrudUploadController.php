<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CrudUploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('admin'); // validasi gate (hanya admin yang bisa akses)
        return view('crudUpload.index', [
            'title' => 'CRUD Upload',
            'data' => Item::orderBy('id', 'ASC')->get()
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
        return view('crudUpload.create', [
            'title' => 'CRUD Upload Create'
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
            'item_name' => 'required|max:255'
        ]);

        // Jika ada file di upload
        if($request->file('item_image')){
            // Upload Image Ke Folder yang sudah kita setting (caranya ada di excel, Bab 21 : Upload Image)
            $validateData['item_image'] = $request->file('item_image')->store('file_upload');
        }

        Item::create($validateData);
        return redirect('/crud_upload')->with('success', 'Data Berhasil Disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('admin'); // validasi gate (hanya admin yang bisa akses)
        return view('crudUpload.edit', [
            'title' => 'CRUD Upload Edit',
            'data' => Item::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->authorize('admin'); // validasi gate (hanya admin yang bisa akses)
        $validateData = $request->validate([
            'item_name' => 'required|max:255'
        ]);

        // Jika ada file di upload
        if($request->file('item_image')){
            // Hapus Image Lama (jangan lupa : use Illuminate\Support\Facades\Storage;)
            if($request->item_image_old){
                Storage::delete($request->item_image_old);
            }

            // Upload Image Ke Folder yang sudah kita setting (caranya ada di excel, Bab 21 : Upload Image)
            $validateData['item_image'] = $request->file('item_image')->store('file_upload');
        }

        Item::where('id', $id)->update($validateData);
        return redirect('/crud_upload')->with('success', 'Data Berhasil Diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('admin'); // validasi gate (hanya admin yang bisa akses)
        $data = Item::find($id);
        
        // Hapus gambar lama
        if($data->item_image){
            Storage::delete($data->item_image);
        }

        Item::destroy($id);
        return redirect('/crud_upload')->with('success', 'Data Berhasil Dihapus!');
    }
}
