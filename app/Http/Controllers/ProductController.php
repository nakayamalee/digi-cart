<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Controllers\FilesController;

class ProductController extends Controller
{
    //
    public function index()
    {
        $products = Product::get();
        return view('backstage.product-index',compact('products'));
    }
    public function create()
    {
        return view('backstage.product-create');
    }
    public function store(Request $request)
    {
        $path = FilesController::imgUpload($request->img_path, 'images');
        Product::create([
            'product_name' => $request->product_name,
            'product_qty' => $request->product_qty,
            'product_price' => $request->product_price,
            'img_path' => $path,
        ]);
        return redirect('/backstage');
    }
    public function edit($id)
    {
        $products = Product::find($id);

        return view('/backstage/product-edit',compact('products'));
    }
    public function update(Request $request, $id)
    {
        $products = Product::find($id);

        //如果有收到圖片
        if($request->hasfile('img_path')){
            FilesController::deleteUpload($products->img_path);
            $path = FilesController::imgUpload($request->img_path, 'images');
            $products->img_path = $path;
        }

        $products->product_name = $request->product_name;
        $products->product_qty = $request->product_qty;
        $products->product_price = $request->product_price;
        $products->save();

        return redirect('/backstage');
    }
    public function destroy($id)
    {
        $products = Product::find($id);
        FilesController::deleteUpload($products->img_path);
        $products->delete();
        return redirect('/backstage');
    }
}
