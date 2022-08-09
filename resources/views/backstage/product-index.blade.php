@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="text-end mb-3">
                    <a class="btn btn-success" href="/backstage/product-create">新增商品</a>
                </div>
                <table id="myTable" class="display">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>商品圖片</th>
                            <th>商品名稱</th>
                            <th>商品數量</th>
                            <th>商品價格</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $index => $product)
                            <tr>
                                <td>{{ $index+1 }}</td>
                                <td><img src="{{ $product->img_path }}" width="200" alt="{{ $product->product_name }}"></td>
                                <td>{{ $product->product_name }}</td>
                                <td>{{ $product->product_qty }}</td>
                                <td>{{ $product->product_price }}</td>
                                <td>
                                    <button class="btn btn-success" onclick="location.href ='/backstage/product-edit/{{$product->id}}'">編輯</button>
                                    <button class="btn btn-danger" type="button" onclick="document.querySelector('#delete_form{{$product->id}}').submit();">刪除</button>
                                <form action="/backstage/product-delete/{{$product->id}}" method="POST" class="d-none" id="delete_form{{$product->id}}">
                                    @csrf
                                </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let table = new DataTable('#myTable');
        });
    </script>
@endsection
