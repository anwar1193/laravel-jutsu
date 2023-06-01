<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Models\Item;
use Illuminate\Support\Facades\Storage;

class DTableServerSideController extends Controller
{
    public function index(Request $request)
    {
        $getItem = Item::orderBy('id', 'ASC')->get();

        $data['title'] = 'DataTables Server Side';

        if($request->ajax()){
            return Datatables::of($getItem)
                ->addIndexColumn()

                ->addColumn('action', function ($row) use($getItem){
                    // dd($row->id);
                    $actionBtn =
                        '<a href="' . route('dtable_serverside.detail', $row->id) .'" class="edit btn btn-warning btn-sm">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a href="' . route('dtable_serverside.detail', $row->id) .'" class="edit btn btn-success btn-sm">
                            <i class="fa fa-edit"></i>
                        </a>';
                    return $actionBtn;
                })

                ->addColumn('item_image', function ($row) use($data){
                    $productImage = '<img src="'.asset('storage/'.$row->item_image).'" class="img-fluid" width="75px" height="75px">';
                    return $productImage;
                })
                ->rawColumns(['action', 'item_image'])
                ->make(true);

                
        }

        $res = $getItem;

        return view('dTableServerSide.index', $data, compact('res'));
    }
}
