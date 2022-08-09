<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Product;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function product_index($page)
    {
        $count = Product::get()->count();
        // skip(4)->take(4)
        $last_page = ceil($count / 4);

        if($count == 0){
            return view('front.product_index',compact('count'));
        }
        if($page>$last_page){
            return redirect('/product-index/'.$last_page);
        }
        if($page<1){
            return redirect('/product-index/1');
        }

        if($page>1){
            $products = Product::offset(($page-1)*4)->limit(4)->get();
        }else{
            $products = Product::limit(4)->get();
        }


        return view('front.product_index',compact('products','page','count','last_page'));
    }
    public function product_intro($id)
    {
        $product = Product::find($id);
        return view('front.product_intro',compact('product'));
    }
}
