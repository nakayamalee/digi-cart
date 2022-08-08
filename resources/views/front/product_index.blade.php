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
            <div class="card mb-3 col-12 col-md-5">
                <div class="row g-0 h-100">
                    <div class="col-md-4">
                        <img src="./img/gorushi.jpg" class="card-img rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body h-100 d-flex flex-column justify-content-evenly">
                            <h5 class="card-title">GOLDEN SHIP</h5>
                            <p class="card-text">單價: 500元</p>
                            <div class="d-flex justify-content-center">
                                <button type="button" class="btn card-btn text-white">查看商品詳情</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-3 col-12 col-md-5">
                <div class="row g-0 h-100">
                    <div class="col-md-4">
                        <img src="./img/gorushi.jpg" class="card-img rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body h-100 d-flex flex-column justify-content-evenly">
                            <h5 class="card-title">GOLDEN SHIP</h5>
                            <p class="card-text">單價: 500元</p>
                            <div class="d-flex justify-content-center">
                                <button type="button" class="btn card-btn text-white">查看商品詳情</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-3 col-12 col-md-5">
                <div class="row g-0 h-100">
                    <div class="col-md-4">
                        <img src="./img/gorushi.jpg" class="card-img rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body h-100 d-flex flex-column justify-content-evenly">
                            <h5 class="card-title">GOLDEN SHIP</h5>
                            <p class="card-text">單價: 500元</p>
                            <div class="d-flex justify-content-center">
                                <button type="button" class="btn card-btn text-white">查看商品詳情</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-3 col-12 col-md-5">
                <div class="row g-0 h-100">
                    <div class="col-md-4">
                        <img src="./img/gorushi.jpg" class="card-img rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body h-100 d-flex flex-column justify-content-evenly">
                            <h5 class="card-title">GOLDEN SHIP</h5>
                            <p class="card-text">單價: 500元</p>
                            <div class="d-flex justify-content-center">
                                <button type="button" class="btn card-btn text-white">查看商品詳情</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="navigation text-center mt-5">
        <button class="btn mx-1 px-3 py-2 border rounded-4 nav-active">1</button>
        <button class="btn mx-1 px-3 py-2 border rounded-4">2</button>
        <button class="btn mx-1 px-3 py-2 border rounded-4">3</button>
    </div>
@endsection
