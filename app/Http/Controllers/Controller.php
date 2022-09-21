<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Product;
use App\Models\User_info;
use App\Models\User_order;
use App\Models\Cart;
use Illuminate\Http\Request;
use Carbon\Carbon;
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

        $product = Product::find($request->product_id);
        if($request->prouduct_qty <=0 || $request->prouduct_qty > $product->product_qty){
            return 'error,please check again';
        }else{
            $qty = $request->prouduct_qty;
            return view('front.pay',compact('product','qty'));
        }
    }
    public function paydone(Request $request){
        $total = 0;
        if(strlen(Carbon::now()->month) == 1){
            $month = '0'.Carbon::now()->month;
        }else{
            $month = Carbon::now()->month;
        }
        if(strlen(Carbon::now()->day) == 1){
            $day = '0'.Carbon::now()->day;
        }else{
            $day = Carbon::now()->day;
        }
        $order_id = 'DIGI'.Carbon::now()->year.$month.$day;
        $uid = new User_info;
        if(!($uid->exists())){
            $next = '0001';
        }else{
            $now_id = $uid->max('id');
            if(strlen($now_id+1) == 1){
                $next = '000'.($now_id+1);
            }else if(strlen($now_id+1) == 2){
                $next = '00'.($now_id+1);
            }else if(strlen($now_id+1) == 3){
                $next = '0'.($now_id+1);
            }else if(strlen($now_id+1) >= 4){
                $next = $now_id+1;
            }
        };
        foreach ($request->id as $key => $item) {
            $product_price = Product::find($item);
            if(!$product_price || $product_price<$request->qty[$key] || $request->qty[$key]<0){
                return redirect('/pay')->with('errormessage','發生錯誤,訂單已取消!');
            }
            $total += $product_price->product_price*$request->qty[$key];
        }

        $user_infos = User_info::create([
            'user_id' => Auth::id(),
            'user_address' => $request->postal_code.$request->city.$request->address,
            'delivery_type' => $request->delivery,
            'pay_type' => $request->pay_way,
            'order_subtotal' => $total,
            'order_id' => $order_id.$next,
            'status' => 0,
        ]);

        foreach ($request->id as $key => $item) {
            $product_price = Product::find($item)->product_price;
            $user_order = User_order::create([
                'product_id' => $item,
                'product_price' => $product_price,
                'product_qty' => $request->qty[$key],
                'user_info_id' => $user_infos->id,
            ]);
        }

        return view('front.pay_done',compact('request','user_infos'));
    }
    public function cart_index()
    {
        // $cart = User_info::where('user_id',Auth::user()->id)->where('isCart',1)->with('user_order','user_order.product')->first();
        $cart = Cart::where('uid',Auth::id())->get();

        return view('front.product_cart',compact('cart'));
    }
    public function customer_center()
    {
        // $cart = User_info::where('user_id',Auth::user()->id)->where('isCart',1)->with('user_order','user_order.product')->first();
        $orders = User_info::where('user_id',Auth::id())->get();
        return view('front.product_customer_center',compact('orders'));
    }
}
