@extends('templates.template')

@section('title')
    訂單完成
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/cart.css') }}">
@endsection

@section('main')
    <div class="conatiner-fulid px-0 pt-5 px-sm-5">
        <div class="row g-3 m-0 justify-content-evenly">
            <div class="card mb-3 col-12 p-0 p-sm-5">
                <!-- <div class="text-center fs-1 fw-bolder text-danger">購物車無商品,請先至商品頁選購喔!</div> -->
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col"><input type="checkbox" id="top_select_all"></th>
                            <th scope="col">#</th>
                            <th scope="col">商品</th>
                            <th scope="col">單價</th>
                            <th scope="col">數量</th>
                            <th scope="col">總價</th>
                            <th scope="col">操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cart->user_order as $key => $item)
                            <tr>
                                <td scope="row"><input type="checkbox"></td>
                                <td>{{$key+1}}</td>
                                <td><a href="/product-intro/{{$item->product_id}}"><img src="{{$item->product->img_path}}" title="{{$item->product->product_name}}" alt="{{$item->product->product_name}}"></a></td>
                                <td>{{$item->product_price}}</td>
                                <td><span id="minus{{$item->product_id}}" class="fs-4 border px-3 py-1">-</span>
                                    <input id="prouduct_qty" class="fs-4 text-center" type="text" value="{{$item->product_qty}}" name="prouduct_qty" readonly>
                                    <span id="pluse{{$item->product_id}}" class="fs-4 border px-3 py-1">+</span></td>
                                <td class="text-primary">{{ $item->product_price*$item->product_qty }}</td>
                                <td><button class="btn btn-danger">刪除</button></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="p-3 px-sm-5 pb-sm-3 d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-center mb-3">
                    <input type="checkbox" id="bot_select_all">
                    <label for="select-all" class="ms-3 fs-3">全選(0)</label>
                </div>
                <div class="d-flex align-items-center mb-3">
                    <span class="fs-3 d-inline-block">總金額(<span class="ms-3 fw-bolder">0</span>個商品): $<span
                            class="ms-3 fw-bolder">0</span></span>
                    <button class="btn btn-danger ms-3 d-inline-block">去買單</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        const select_all_inputs = document.querySelectorAll('input[id*="select_all"]');

        select_all_inputs.forEach(select_all_input => {
            select_all_input.addEventListener('click', () => {
                if (select_all_input.checked === false) {
                    const all_check_inputs = document.querySelectorAll('input[type="checkbox"]');
                    all_check_inputs.forEach((check_input) => {
                        check_input.checked = false;
                    });
                } else {
                    const all_check_inputs = document.querySelectorAll('input[type="checkbox"]');
                    all_check_inputs.forEach((check_input) => {
                        check_input.checked = true;
                    });
                }
            });
        });
    </script>
@endsection
