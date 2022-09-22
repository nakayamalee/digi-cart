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
        if(!isset($request->product_id) || !isset($request->prouduct_qty)){
            return redirect('/cart-index');
        }
        $total = 0;
        $products = Product::whereIn('id',$request->product_id)->get();
        $qty = $request->prouduct_qty;

        foreach ($products as $key => $item) {
            $total += $item->product_price*$qty[$key];
        }

        return view('front.pay',compact('products','qty','total'));
    }
    public function create_order(Request $request)
    {
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
            if(!($product_price) || $product_price->product_qty<$request->qty[$key] || $request->qty[$key]<0){
                return redirect('/pay')->with('errormessage','發生錯誤,訂單已取消!');
            }
            $total += $product_price->product_price*$request->qty[$key];
        }

        if($request->delivery == 1){
            $delivery_bill = 60;
        }else if($request->delivery == 2){
            $delivery_bill = 50;
        }else if($request->delivery == 3){
            $delivery_bill = 60;
        }else if($request->delivery == 4){
            $delivery_bill = 45;
        }else if($request->delivery == 5){
            $delivery_bill = 90;
        }

        $user_infos = User_info::create([
            'user_id' => Auth::id(),
            'user_address' => $request->postal_code.$request->city.$request->address,
            'delivery_type' => $request->delivery,
            'delivery_bill' => $delivery_bill,
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



        return redirect('/paydone/'.$order_id.$next);
    }

    public function pay_done($order_id)
    {
        $user_infos = User_info::where('order_id',$order_id)->first();
        return view('front.pay_done',compact('user_infos'));
    }

    public function cart_index()
    {
        $cart = Cart::where('uid',Auth::id())->with('product')->get();

        return view('front.product_cart',compact('cart'));
    }
    public function customer_center()
    {
        // $cart = User_info::where('user_id',Auth::user()->id)->where('isCart',1)->with('user_order','user_order.product')->first();
        $orders = User_info::where('user_id',Auth::id())->get();
        return view('front.product_customer_center',compact('orders'));
    }

    public function add_cart(Request $request)
    {
        $find_cart_order = Cart::where('uid',Auth::id())->where('pid',$request->product_id)->first();
        if(empty($find_cart_order)){
            Cart::create([
                'uid' => Auth::id(),
                'pid' => $request->product_id,
                'qty' => $request->product_qty,
            ]);
            return 'add into cart';
        }else{
            $find_cart_order->update([
                'qty' => $request->product_qty,
            ]);
            return 'edit cart';
        }
    }
}
