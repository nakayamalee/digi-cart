@extends('templates.template')

@section('title')
    會員中心
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/product.css') }}">
@endsection

@section('main')
    <div class="conatiner-fulid px-5 pt-5">
        <div class="row g-3 m-0 justify-content-evenly">
            <div class="card mb-3 col-12">
                <div class="row g-0 h-100">
                    <div class="col-md-4">
                        <img src="{{$product->img_path}}" class="card-img rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body h-100 d-flex flex-column justify-content-evenly">
                            <h5 class="card-title">商品名稱 : {{$product->product_name}}</h5>
                            <p class="card-text">單價 : {{$product->product_price}}元</p>
                            <p class="card-text">庫存 : {{$product->product_qty}}件</p>
                            @if ($product->product_qty == 0)
                                <p class="card-text text-danger">已完售</p>
                                <div class="d-flex justify-content-center">
                                    <button type="button" class="btn card-btn text-white me-5" onclick="history.back();">返回列表</button>
                                </div>
                            @else
                                <p class="card-text">
                                    數量 :<input type="number" min="1" max="{{$product->product_qty}}" value="1">
                                </p>
                                <div class="d-flex justify-content-center">
                                    <button type="button" class="btn card-btn text-white me-5">加入購物車</button>
                                    <button type="button" class="btn card-btn text-white">直接購買</button>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
