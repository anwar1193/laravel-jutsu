<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Province;

class DynamicselectController extends Controller
{
    public function index()
    {
        $provinces = Province::orderBy('province_name', 'ASC')->get();
        return view('dynamicSelect.index', [
            'title' => 'Laravel Jutsu | Dynamic Select',
            'provinces' => $provinces
        ]);
    }

    public function showCity(Request $request){
        $province_id = $request->province_id;
        $city_v = "<option value=''>--Pilih--</option>";

        $cities = City::where('province_id', $province_id)->get();

        foreach($cities as $data){
            $city_v .= "<option value='$data[id]'>$data[city_name]</option>";
        }

        return $city_v;
    }
}
