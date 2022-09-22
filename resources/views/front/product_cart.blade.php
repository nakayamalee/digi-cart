@extends('templates.template')

@section('title')
    訂單完成
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/cart.css') }}">
@endsection

@section('main')
    <div class="conatiner-fulid px-0 pt-5 px-sm-5">
        <form action="/pay" method="GET">
            <div class="row g-3 m-0 justify-content-evenly">
                <div class="card mb-3 col-12 p-0 p-sm-5">
                    @if(count($cart)==0)
                        <div class="text-center fs-1 fw-bolder text-danger">購物車無商品,請先至商品頁選購喔!</div>
                    @else
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col"><input type="checkbox" id="top_select_all" checked></th>
                                <th scope="col">#</th>
                                <th scope="col">商品</th>
                                <th scope="col">商品名稱</th>
                                <th scope="col">單價</th>
                                <th scope="col">數量</th>
                                <th scope="col">總價</th>
                                <th scope="col">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cart as $key => $item)
                                <tr>
                                    <td scope="row"><input data-number="{{$key+1}}" type="checkbox" onclick="select_item(this,{{$key+1}})" checked></td>
                                    <td>{{$key+1}}</td>
                                    <td><a href="/product-intro/{{$item->pid}}"><img src="{{$item->product->img_path}}" title="{{$item->product->product_name}}" alt="{{$item->product->product_name}}"></a></td>
                                    <td>
                                        {{$item->product->product_name}}
                                        <input type="hidden" name="product_id[]" value="{{$item->pid}}" data-select="{{$key+1}}">
                                    </td>
                                    <td>{{$item->product->product_price}}</td>
                                    <td class="change_qty">
                                        <span class="fs-4 border px-3 py-1" data-sym="-">-</span>
                                        <input id="prouduct_qty" class="fs-4 text-center" type="number" value="{{$item->qty}}" name="prouduct_qty[]" data-stock = "{{$item->product->product_qty}}" onblur="checkQty(this)" data-select="{{$key+1}}">
                                        <span class="fs-4 border px-3 py-1" data-sym="+">+</span></td>
                                    <td class="text-primary item-total">{{ $item->product->product_price*$item->qty }}</td>
                                    <td><button type="button" class="btn btn-danger">刪除</button></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif
                </div>
                @if (count($cart)!=0)
                    <div class="p-3 px-sm-5 pb-sm-3 d-flex justify-content-between flex-wrap">
                        <div class="d-flex align-items-center mb-3">
                            <input type="checkbox" id="bot_select_all" checked>
                            <label for="select-all" class="ms-3 fs-3">全選({{count($cart)}})</label>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <span class="fs-3 d-inline-block">總金額(<span class="ms-3 fw-bolder">{{count($cart)}}</span>個商品): $<span
                                    class="ms-3 fw-bolder" id="total">0</span></span>
                            <button id="submitBtn" type="submit" class="btn btn-danger ms-3 d-inline-block" name="cart" value="cart">去買單</button>
                        </div>
                    </div>
                @endif
            </div>
        </form>
    </div>
@endsection

@section('js')
    <script>
        const select_all_inputs = document.querySelectorAll('input[id*="select_all"]');
        const change_qty = document.querySelectorAll('.change_qty');
        const items_total = document.querySelectorAll('.item-total');
        const total = document.querySelector('#total');
        const submitBtn = document.querySelector('#submitBtn');
        const form = document.querySelector('form');

        items_total.forEach((item)=>{
            total.textContent = parseInt(total.textContent) + parseInt(item.textContent);
        });


        select_all_inputs.forEach(select_all_input => {
            select_all_input.addEventListener('click', () => {
                const all_check_inputs = document.querySelectorAll('input[type="checkbox"]');
                const inputs = document.querySelectorAll(`input[data-select]`);
                if (select_all_input.checked === false) {
                    all_check_inputs.forEach((check_input) => {
                        check_input.checked = false;
                    });
                    inputs.forEach((input) => {
                        input.disabled = true;
                    });
                } else {
                    all_check_inputs.forEach((check_input) => {
                        check_input.checked = true;
                    });
                    inputs.forEach((input) => {
                        input.disabled = false;
                    });
                }
            });
        });


        change_qty.forEach((qty_controller)=>{
            qty_controller.addEventListener('click',function (e) {
                if(e.target.dataset.sym == '+' && this.children[1].value < parseInt(this.children[1].dataset.stock)){
                    this.children[1].value++;

                }else if(e.target.dataset.sym == '-' && this.children[1].value > 1){
                    this.children[1].value--;

                }
            })
        });

        function checkQty(e){
            if(e.value > parseInt(e.dataset.stock)){
                e.value = parseInt(e.dataset.stock);
            }else if(e.value <= 0){
                e.value = 1;
            }
        }

        function select_item(e,id){
            const inputs = document.querySelectorAll(`input[data-select="${id}"]`);
            if(e.checked == true){
                inputs.forEach((input)=>{
                    input.disabled = false;
                });
            }else{
                inputs.forEach((input)=>{
                    input.disabled = true;
                });
            }
            // console.log(inputs);
        }

        submitBtn.addEventListener('click',()=>{
            form.addEventListener('submit',(e)=>{
                const choose = document.querySelectorAll('input[data-number]');
                let flag = true;
                choose.forEach(element => {
                    if (element.checked == true) {
                        flag = false;
                    }
                });
                if(flag){
                    e.preventDefault();
                    Swal.fire({
                        icon: 'error',
                        title: '請選擇至少一件商品',
                    });
                }
            });
        })
    </script>
@endsection
