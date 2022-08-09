@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <h1 class="text-center mb-3">新增商品</h1>
            <div class="col-md-8 border rounded p-5">
                <form action="/backstage/product-store" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="product_name">商品名稱:</label><br>
                        <input id="product_name" name="product_name" type="text" required>
                    </div>
                    <div class="mb-3">
                        <label for="img_path">商品圖片:</label><br>
                        <input id="img_path" name="img_path" type="file" required>
                    </div>
                    <div class="mb-3">
                        <label for="product_qty">商品數量:</label><br>
                        <input id="product_qty" name="product_qty" type="number" min="0" required>
                    </div>
                    <div class="mb-3">
                        <label for="product_price">商品價格:</label><br>
                        <input id="product_price" name="product_price" type="number" min="0" required>
                    </div>
                    <div>
                        <button type="button" class="btn btn-secondary" onclick="location.href='/backstage/product-index'">取消</button>
                        <button type="submit" class="btn btn-success">新增商品</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
