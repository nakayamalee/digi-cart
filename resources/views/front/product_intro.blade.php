@extends('templates.template')

@section('title')
    商品詳細
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/product.css') }}">
    <style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
        }

        /* Firefox */
        input[type=number] {
        -moz-appearance: textfield;
        }
    </style>
@endsection

@section('main')
    <div class="conatiner-fulid px-5 pt-5">
        <div class="row g-3 m-0 justify-content-evenly">
            <div class="card mb-3 col-12">
                <div class="row g-0 h-100">
                    <div class="col-md-4">
                        <img src="{{ $product->img_path }}" class="card-img rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body h-100 d-flex flex-column justify-content-evenly">
                            <form action="/pay" method="GET">
                                <h5 class="card-title">商品名稱 : {{ $product->product_name }}</h5>
                                <input type="hidden" name="product_id[]" value="{{ $product->id }}">
                                <p class="card-text">單價 : {{ $product->product_price }}元</p>
                                {{-- <input type="hidden" name="product_price" value="{{ $product->product_price }}"> --}}
                                <p class="card-text">庫存 : {{ $product->product_qty }}件</p>
                                @if ($product->product_qty == 0)
                                    <p class="card-text text-danger">已完售</p>
                                    <div class="d-flex justify-content-center">
                                        <button type="button" class="btn card-btn text-white me-5"
                                            onclick="history.back();">返回列表</button>
                                    </div>
                                @else
                                    <p class="card-text" id="qty">
                                        數量 :
                                        <span id="minus" class="fs-4 border px-3 py-1">-</span>
                                        {{-- <span id="qty">1</span> --}}
                                        <input id="prouduct_qty" class="fs-4 text-center" type="number" min="1"
                                            max="{{ $product->product_qty }}" value="1" name="prouduct_qty[]" onblur="checkQty()">
                                        <span id="pluse" class="fs-4 border px-3 py-1">+</span>
                                    </p>
                                    <div class="d-flex justify-content-center">
                                        <button type="button" id="add_to_cart" onclick="cart()"
                                            data-id="{{ $product->id }}"
                                            class="btn card-btn text-white me-5">加入購物車</button>
                                        <button  type="submit" class="btn card-btn text-white">直接購買</button>
                                    </div>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        const pluse_btn = document.querySelector('#pluse');
        const minus_btn = document.querySelector('#minus');
        const prouduct_qty = document.querySelector('#prouduct_qty');
        const add_to_cart = document.querySelector('#add_to_cart');

        pluse_btn.addEventListener('click', () => {
            if (Number(prouduct_qty.value) < Number(prouduct_qty.max)) {
                prouduct_qty.value++;
            }
        });
        minus_btn.addEventListener('click', () => {
            if (Number(prouduct_qty.value) > Number(prouduct_qty.min)) {
                prouduct_qty.value--;
            }
        });

        function checkQty(){
            if(parseInt(prouduct_qty.value) > parseInt(prouduct_qty.max)){
                prouduct_qty.value = parseInt(prouduct_qty.max);
            }else if(parseInt(prouduct_qty.value) <= 0){
                prouduct_qty.value = 1;
            }
        }

        function cart() {
            const cartData = new FormData();
            const qty = prouduct_qty.value;
            cartData.append('_token', '{{ csrf_token() }}'); //TOKEN
            cartData.append('product_id', add_to_cart.dataset.id);
            cartData.append('product_qty', qty);
            fetch('/add_cart', {
                method: 'POST',
                body: cartData,
            }).then(function(response) {
                return response.text(); //接收資料
            }).then(function(data) {
                if (data === 'add into cart') {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: '成功加入購物車',
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
                if (data === 'edit cart') {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: '成功更新購物車',
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            })
        }
    </script>
@endsection
