<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CrudMultipleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('admin');
        $data = Transaction::orderBy('id', 'ASC')->get();
        return view('crudMultiple.index', [
            'title' => 'CRUD Multiple',
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // CSG030050001
        // Nomor Otomatis Start ------------------------------------------
        $kode_cabang = 'CSG';
        $kode_asset = '03';
        $kode_sub_kategori = '005';

        $query_nomoto = DB::select("SELECT MAX(MID(trans_code, 9, 5)) AS nomor_otomatis
        FROM transactions
        WHERE 
            MID(trans_code, 1, 3) = '$kode_cabang' AND 
            MID(trans_code, 4, 2) = '$kode_asset' AND 
            MID(trans_code, 6,3) = '$kode_sub_kategori'
        ");

        foreach($query_nomoto as $data){
            if($data->nomor_otomatis != ''){
                $jumlah_data = 1;
            }else{
                $jumlah_data = 0;
            }
        }

        if($jumlah_data > 0){
            $n = ((int)$query_nomoto[0]->nomor_otomatis + 1);
            $no = sprintf("%'.05d", $n);
        }else{
            $no = '00001';
        }

        $nomor_otomatis = $kode_cabang.$kode_asset.$kode_sub_kategori.$no;
        // Nomor Otomatis End --------------------------------------------

        $product = Product::orderBy('product_name', 'ASC')->get();
        return view('crudMultiple.create', [
            'title' => 'CRUD Multiple (Create)',
            'product' => $product,
            'nomor_otomatis' => $nomor_otomatis
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
        $validateData = $request->validate([
            'trans_code' => 'required|max:255|min:2|unique:transactions,trans_code',
            'trans_admin' => 'required'
        ]);

        $proses_simpan = Transaction::create($validateData);

        if($proses_simpan){

            // Simpan List Product
            $product = $request->trans_product;
            for($i=0; $i<sizeof($product); $i++){
                TransactionDetail::create([
                    'trans_code' => $validateData['trans_code'],
                    'trans_product' => $product[$i]
                ]);
            }

            return redirect('/crud_multiple')->with('success', 'Data Berhasil Disimpan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Transaction::find($id);
        $kode_transaksi = $data->trans_code;

        $detail = DB::table('transaction_details')
        ->join('products', 'transaction_details.trans_product', '=', 'products.id')
        ->select('transaction_details.*', 'products.product_name')
        ->where('trans_code', $kode_transaksi)
        ->get();

        return view('crudMultiple.detail', [
            'title' => 'CRUD Multiple - Detail Data',
            'data' => $data,
            'detail' => $detail
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Transaction::find($id);
        $kode_transaksi = $data->trans_code;

        $detail = DB::table('transaction_details')
        ->join('products', 'transaction_details.trans_product', '=', 'products.id')
        ->select('transaction_details.*', 'products.product_name')
        ->where('trans_code', $kode_transaksi)
        ->get();

        $product = Product::orderBy('product_name', 'ASC')->get();
        return view('crudMultiple.edit', [
            'title' => 'CRUD Multiple (Edit)',
            'product' => $product,
            'data' => $data,
            'detail' => $detail
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'trans_code' => 'required|max:255|min:2',
            'trans_admin' => 'required'
        ]);

        $trans_code = $validateData['trans_code'];

        $proses_update = Transaction::where('id', $id)->update($validateData);

        if($proses_update){

            // Hapus List Product Sebelumnya
            DB::table('transaction_details')->where('trans_code', $trans_code)->delete();

            // Simpan List Product Baru
            $product = $request->trans_product;
            for($i=0; $i<sizeof($product); $i++){
                TransactionDetail::create([
                    'trans_code' => $validateData['trans_code'],
                    'trans_product' => $product[$i]
                ]);
            }

            return redirect('/crud_multiple')->with('success', 'Data Berhasil Disimpan');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Transaction::find($id);

        $trans_code = $data->trans_code;

        // Hapus detail nya
        DB::table('transaction_details')->where('trans_code', $trans_code)->delete();

        // Hapus data utama di bawah karena untuk dapat detail kita harus dapatkan trans_code nya
        $proses_hapus = Transaction::destroy($id);

        return redirect('/crud_multiple')->with('success', 'Data Berhasil Dihapus');

    }
}
