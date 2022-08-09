@extends('layouts.app')

@section('css')
    <style>
        #product_img{
            width: 100%;
            max-width: 500px;
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <h1 class="text-center mb-3">編輯商品</h1>
            <div class="col-md-8 border rounded p-5">
                <form action="/backstage/product-update/{{$products->id}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="product_name">商品名稱:</label><br>
                        <input id="product_name" name="product_name" type="text" value="{{$products->product_name}}" required>
                    </div>
                    <div class="mb-3">
                        <label for="img_path">商品圖片:</label><br>
                        <input id="img_path" name="img_path" type="file">
                        <div>現在商品圖片:</div>
                        <img id="product_img" src="{{$products->img_path}}" alt="{{$products->product_name}}">
                    </div>
                    <div class="mb-3">
                        <label for="product_qty">商品數量:</label><br>
                        <input id="product_qty" name="product_qty" type="number" min="0" value="{{$products->product_qty}}" required>
                    </div>
                    <div class="mb-3">
                        <label for="product_price">商品價格:</label><br>
                        <input id="product_price" name="product_price" type="number" min="0" value="{{$products->product_price}}" required>
                    </div>
                    <div>
                        <button type="button" class="btn btn-secondary" onclick="location.href='/backstage/product-index'">取消</button>
                        <button type="submit" class="btn btn-success">更新商品</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
