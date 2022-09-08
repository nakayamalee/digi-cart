<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Product;
use App\Models\User_info;
use App\Models\User_order;
use Illuminate\Http\Request;
use Auth;


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
    public function pay(Request $request)
    {
        $token = rand(10000, 99999);
        session(['form_token'=> $token]);

        $product = Product::find($request->product_id);
        if($request->prouduct_qty <=0 || $request->prouduct_qty > $product->product_qty){
            return 'error,please check again';
        }else{
            $qty = $request->prouduct_qty;
            return view('front.pay',compact('product','qty','token'));
        }
    }
    public function paydone(Request $request){
        $input_token = $request->token;
        $token = session('form_token');
        if($input_token == $token) {
            session(['form_token'=> null]);
        } else {
            return '請勿重複提交!! <a href="/">回到首頁</a>';
        }
        $subtotal = 0;
        $product_arr = $request->id;
        $products = Product::find($product_arr);
        $user_info = User_info::create([
            'user_id'=>Auth::user()->id,
            'user_address' => $request->postal_code.$request->city.$request->address,
            'pay_type' => $request->pay_way,
            'delivery_type' => $request->delivery,
            'isCart'=>0,
        ]);

        foreach ($product_arr as $key => $value) {
            $product = Product::find($value);
            User_order::create([
                'product_id'=>$value,
                'product_price'=>$product->product_price,
                'product_qty'=>$request->qty[$key],
                'product_id'=>$value,
                'user_info_id'=> $user_info->id,
                'status'=>1,
                'isCart'=>0,
            ]);

            $product->product_qty=$product->product_qty-$request->qty[$key];
            $product->save();
            $subtotal+=$product->product_price*$request->qty[$key];
        }
        if($request->delivery==1 || $request->delivery==3){
            $subtotal = $subtotal + 60;
        }else if($request->delivery==2){
            $subtotal = $subtotal + 50;
        }else if($request->delivery==4){
            $subtotal = $subtotal + 45;
        }else if($request->delivery==5){
            $subtotal = $subtotal + 90;
        }

        $user_info->order_subtotal = $subtotal;
        $user_info->save();


        return view('front.pay-done',compact('products','request','user_info'));
    }
    public function add_cart(Request $request)
    {
        // $cart = Cart::where('uid',Auth:id())->get();


        // $cart = User_info::where('user_id',Auth::id())->where('isCart',1)->first();

        // if(!isset($cart)){
        //     $product_id = $request->product_id;
        //     $product_qty = $request->product_qty;
        //     $product = Product::find($product_id);

        //     if($product->product_qty <=0 || $product_qty > $product->product_qty){
        //         return 'number error';
        //     }else{
        //         $user_info = User_info::create([
        //             'user_id'=>Auth::user()->id,
        //             'isCart'=>1,
        //         ]);
        //         User_order::create([
        //             'product_id'=>$product_id,
        //             'product_price'=>$product->product_price,
        //             'product_qty'=>$product_qty,
        //             'user_info_id'=> $user_info->id,
        //             'status'=>0,
        //             'isCart'=>1,
        //         ]);
        //     }
        // }else{
        //     return 'already in cart';
        // }
    }
    public function cart_index()
    {
        // $cart = User_info::where('user_id',Auth::user()->id)->where('isCart',1)->with('user_order','user_order.product')->first();

        return view('front.product_cart');
    }
    public function customer_center()
    {
        // $cart = User_info::where('user_id',Auth::user()->id)->where('isCart',1)->with('user_order','user_order.product')->first();
        $orders = User_info::where('user_id',Auth::id())->get();
        return view('front.product_customer_center',compact('orders'));
    }
}
