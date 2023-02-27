<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CrudajaxController extends Controller
{
    public function index(){
        $this->authorize('admin'); // validasi gate (hanya admin yang bisa akses)
        $products = Product::orderBy('id', 'ASC')->get();
        return view('crudAjax.index', [
            'title' => 'Laravel Jutsu | CRUD AJAX',
            'products' => $products
        ]);
    }

    public function addProduct(Request $request)
    {
        $this->authorize('admin'); // validasi gate (hanya admin yang bisa akses)
        $product = new Product();
        $product->product_code = $request->productCode;
        $product->product_name = $request->productName;
        $product->product_category = $request->productCategory;
        $product->product_stock = $request->productStock;
        $product->product_image = $request->productImage;
        $product->save();
        return response()->json($product);
    }

    public function getProductById($id){
        $this->authorize('admin'); // validasi gate (hanya admin yang bisa akses)
        $product = Product::find($id);
        return response()->json($product);
    }

    public function updateProduct(Request $request)
    {
        $this->authorize('admin'); // validasi gate (hanya admin yang bisa akses)
        $product = Product::find($request->id);
        $product->product_code = $request->productCode;
        $product->product_name = $request->productName;
        $product->product_category = $request->productCategory;
        $product->product_stock = $request->productStock;
        $product->product_image = $request->productImage;
        $product->save();
        return response()->json($product);
    }

    public function deleteProduct($id){
        $this->authorize('admin'); // validasi gate (hanya admin yang bisa akses)
        $product = Product::find($id);
        $product->delete();
        return response()->json(['success' => 'Record has been deleted']);
    }
}
