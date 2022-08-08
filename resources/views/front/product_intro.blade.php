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
                        <img src="./img/gorushi.jpg" class="card-img rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body h-100 d-flex flex-column justify-content-evenly">
                            <h5 class="card-title">品名 : GOLDEN SHIP</h5>
                            <p class="card-text">單價 : 500元</p>
                            <p class="card-text">庫存 : 500個</p>
                            <p class="card-text">庫存 : 500件</p>
                            <p class="card-text">
                                數量 :<input type="number" min="1" value="1">
                            </p>
                            <div class="d-flex justify-content-center">
                                <button type="button" class="btn card-btn text-white me-5">加入購物車</button>
                                <button type="button" class="btn card-btn text-white">直接購買</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
