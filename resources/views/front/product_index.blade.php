@extends('templates.template')

@section('title')
    會員中心
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/product.css') }}">
@endsection

@section('main')
    <div class="conatiner-fulid px-5 pt-5">
        @if ($count == 0)
            <h1 class="text-danger fw-bolder text-center display-1"><ins>尚無商品上架，請耐心等候</ins></h1>
        @endif
        @if (isset($products))
            <div class="row g-3 m-0 justify-content-evenly">
                <?php $index=0;?>
                @foreach ($products as $product)
                    <?php $index++;?>
                    <div class="card mb-3 col-12 col-md-5">
                        <div class="row g-0 h-100">
                            <div class="col-md-4">
                                <img src="{{$product->img_path}}" class="card-img rounded-start" alt="{{$product->product_name}}">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body h-100 d-flex flex-column justify-content-evenly">
                                    <h5 class="card-title">{{$product->product_name}}</h5>
                                    <p class="card-text">單價: {{$product->product_price}}元</p>
                                    @if ($product->product_qty == 0)
                                        <p class="card-text text-danger">已完售</p>
                                    @endif
                                    <div class="d-flex justify-content-center">
                                        <button type="button" class="btn card-btn text-white" onclick="location.href='/product-intro/{{$product->id}}';">查看商品詳情</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                @if ($index != 4)
                    @for ($i = 0; $i < 4-$index;$i++)
                        <div class="card col-12 col-md-5 opacity-0">

                        </div>
                    @endfor
                @endif
            </div>
        @endif
    </div>
    @if (isset($page))
        <div class="navigation text-center py-5">

            <button class="btn mx-1 px-3 py-2 border rounded-4"@if ($page<3) style="opacity:0;cursor: auto;"  @else onclick="location.href='/product-index/1'" @endif>1<<</button>

            @if ($last_page == $page && $page>3)
            <button class="btn mx-1 px-3 py-2 border rounded-4" onclick="location.href='/product-index/{{$page-2}}'">{{$page-2}}</button>
            @endif

            @if ($page>1)
            <button class="btn mx-1 px-3 py-2 border rounded-4" onclick="location.href='/product-index/{{$page-1}}'">{{$page-1}}</button>
            @endif

            <button class="btn mx-1 px-3 py-2 border rounded-4 nav-active" onclick="location.href='/product-index/{{$page}}'">{{$page}}</button>

            @if ($last_page > $page)
                <button class="btn mx-1 px-3 py-2 border rounded-4" onclick="location.href='/product-index/{{$page+1}}'">{{$page+1}}</button>
            @endif
            @if ($page  == 1 && $last_page>3)
                <button class="btn mx-1 px-3 py-2 border rounded-4" onclick="location.href='/product-index/{{$page+2}}'">{{$page+2}}</button>
            @endif

            <button class="btn mx-1 px-3 py-2 border rounded-4"@if ($last_page == $page) style="opacity:0;cursor: auto;" @else onclick="location.href='/product-index/{{$last_page}}'" @endif>>>{{$last_page}}</button>
        </div>
    @endif
@endsection
