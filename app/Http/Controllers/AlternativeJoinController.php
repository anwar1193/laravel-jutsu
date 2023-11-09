<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransactionDetail;
use App\Models\Product;

class AlternativeJoinController extends Controller
{
    public function index()
    {
        $trx_detail = TransactionDetail::get();

        foreach($trx_detail as $item){
            $id_product = $item->trans_product;
            $dataProduct = Product::where('id', $id_product)->first();

            $nama_product = $dataProduct->product_name;

            $result[] = array(
                "id_transaksi" => $item->id,
                "kode_transaksi" => $item->trans_code,
                "nama_product" => $nama_product,
                "tanggal_transaksi" => $item->created_at
            );
        }

        // dd($result);

        // foreach($result as $row){
        //     echo $row['nama_product'];
        //     echo '<br>';
        // }

        $data['title'] = 'Alternative Join';
        $data['result'] = $result;

        return view('alternativeJoin.index', $data);
    }
}
