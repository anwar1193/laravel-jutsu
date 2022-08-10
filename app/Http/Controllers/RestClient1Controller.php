<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RestClient1Controller extends Controller
{

    public function index()
    {
        $response = Http::get('https://anwar-news.000webhostapp.com/api/mahasiswa');
        // return $response->json();

        json_decode($response, true);
        // return $response['data'][0]['username'];

        $data = $response['data'];

        return view('restclient1.index', [
            'title' => 'Rest Client 1',
            'data' => $data
        ]);
    }


    public function create()
    {
        return view('restclient1.create', [
            'title' => 'Add Data To Rest 1'
        ]);
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'username' => 'required|min:3',
            'address' => 'required|min:3'
        ]);

        $username = $request->username;
        $address = $request->address;

        $response = Http::post('https://anwar-news.000webhostapp.com/api/mahasiswa/store', [
            'username' => $username,
            'address' => $address
        ]);

        return redirect('/rest_client1')->with('success', 'Data Berhasil Di Tambahkan Ke Rest Server !');
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $response = Http::get('https://anwar-news.000webhostapp.com/api/mahasiswa/show/'.$id);
        json_decode($response, true);

        $data = $response['data'][0];

        return view('restclient1.edit', [
            'title' => 'Update Data',
            'data' => $data
        ]);
    }


    public function update(Request $request, $id)
    {
        $validasi = $request->validate([
            'username' => 'required',
            'address' => 'required'
        ]);

        $username = $request->username;
        $address = $request->address;

        $response = Http::post('https://anwar-news.000webhostapp.com/api/mahasiswa/update/'.$id, [
            'username' => $username,
            'address' => $address
        ]);

        return redirect('rest_client1')->with('success', 'Data Berhasil Di Update!');
    }


    public function destroy($id)
    {
        $response = Http::get('https://anwar-news.000webhostapp.com/api/mahasiswa/destroy/'.$id);
        return redirect('/rest_client1')->with('success', 'Data Berhasil Dihapus !');
    }
}
