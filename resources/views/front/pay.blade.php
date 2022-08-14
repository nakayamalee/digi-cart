@extends('templates.template')

@section('title')
    訂單確認
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/pay.css') }}">
@endsection

@section('main')
    <div class="container pt-5">
        <table class="table table-striped border">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">商品</th>
                    <th scope="col">單價</th>
                    <th scope="col">數量</th>
                    <th scope="col">總價</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td><a href="/product-intro/{{$product->id}}"><img src="{{$product->img_path}}" title="{{$product->product_name}}" alt="{{$product->product_name}}"></a></td>
                    <td>${{$product->product_price}}</td>
                    <td>{{$qty}}</td>
                    <td class="text-primary" id="sub_price">${{$product->product_price * $qty}}</td>
                </tr>
            </tbody>
        </table>
        <form action="" method="POST">
            <div id="delivery-info" class="border py-3 px-5 mb-3">
                <!-- 1:seven 2:hi-life 3.family 4.ok-mart 5.home-delivery -->
                <input type="radio" name="delivery" hidden checked id="seven" value="1" data-way="7-ELEVEN" data-price="60">
                <label for="seven" class="w-100">
                    <div class="d-flex flex-nowrap border mb-3">
                        <div class="delivery border-end"></div>
                        <div class="d-flex w-100 px-3 py-2">
                            <div class="me-auto">7-ELEVEN</div>
                            <div class="">$60</div>
                        </div>
                    </div>
                </label>
                <input type="radio" name="delivery" hidden id="hi-life" value="2" data-way="萊爾富" data-price="50">
                <label for="hi-life" class="w-100">
                    <div class="d-flex flex-nowrap border mb-3">
                        <div class="delivery border-end"></div>
                        <div class="d-flex w-100 px-3 py-2">
                            <div class="me-auto">萊爾富</div>
                            <div class="">$50</div>
                        </div>
                    </div>
                </label>
                <input type="radio" name="delivery" hidden id="family" value="3" data-way="全家" data-price="60">
                <label for="family" class="w-100">
                    <div class="d-flex flex-nowrap border mb-3">
                        <div class="delivery border-end"></div>
                        <div class="d-flex w-100 px-3 py-2">
                            <div class="me-auto">全家</div>
                            <div class="">$60</div>
                        </div>
                    </div>
                </label>
                <input type="radio" name="delivery" hidden id="ok-mart" value="4" data-way="OK Mart" data-price="45">
                <label for="ok-mart" class="w-100">
                    <div class="d-flex flex-nowrap border mb-3">
                        <div class="delivery border-end"></div>
                        <div class="d-flex w-100 px-3 py-2">
                            <div class="me-auto">OK Mart</div>
                            <div class="">$45</div>
                        </div>
                    </div>
                </label>
                <input type="radio" name="delivery" hidden id="home-delivery" value="5" data-way="宅配" data-price="90">
                <label for="home-delivery" class="w-100">
                    <div class="d-flex flex-nowrap border mb-3">
                        <div class="delivery border-end"></div>
                        <div class="d-flex w-100 px-3 py-2">
                            <div class="me-auto">宅配</div>
                            <div class="">$90</div>
                        </div>
                    </div>
                </label>
                <div class="d-flex mb-3">
                    <select name="city" id="city" class="col-6 p-2" required>
                        <option disabled>縣市</option>
                        <option value="臺北市">臺北市</option>
                        <option value="新北市">新北市</option>
                        <option value="桃園市">桃園市</option>
                        <option value="臺中市">臺中市</option>
                        <option value="臺南市">臺南市</option>
                        <option value="高雄市">高雄市</option>
                        <option value="宜蘭縣">宜蘭縣</option>
                        <option value="新竹縣">新竹縣</option>
                        <option value="苗栗縣">苗栗縣</option>
                        <option value="彰化縣">彰化縣</option>
                        <option value="南投縣">南投縣</option>
                        <option value="雲林縣">雲林縣</option>
                        <option value="嘉義縣">嘉義縣</option>
                        <option value="屏東縣">屏東縣</option>
                        <option value="花蓮縣">花蓮縣</option>
                        <option value="臺東縣">臺東縣</option>
                        <option value="澎湖縣">澎湖縣</option>
                        <option value="基隆市">基隆市</option>
                        <option value="新竹市">新竹市</option>
                        <option value="嘉義市">嘉義市</option>
                    </select>
                    <input type="text" class="col-6 p-2" name="postal-code" placeholder="郵遞區號" required>
                </div>
                <input type="text" class="w-100 p-2 mb-3" name="address" placeholder="區,街道,巷弄,門號,樓層" required>
                <div class="d-flex">
                    <span class="me-3">寄送資訊:</span>
                    <div>
                        <div id="way">7-ELEVEN</div>
                        <div id="tel">{{Auth::user()->phone}}</div>
                        <div id="address"><span>404</span><span></span>臺北市<span>北區 文化路777號</span></div>
                    </div>
                </div>
            </div>
            <div id="pay-way" class="border py-3 px-5">
                <input type="radio" name="pay-way" hidden id="cash" data-way="貨到付款" checked>
                <label for="cash" class="py-2 px-3 border rounded">貨到付款</label>
                <input type="radio" name="pay-way" hidden id="card" data-way="信用卡/金融卡">
                <label for="card" class="py-2 px-3 border rounded">信用卡/金融卡</label>
                <input type="radio" name="pay-way" hidden id="atm" data-way="銀行轉帳">
                <label for="atm" class="py-2 px-3 border rounded">銀行轉帳</label>
                <div class="mt-3">付款方式 : <span id="pay-way-info">貨到付款</span></div>
            </div>
            <div class="p-5 text-end d-flex justify-content-end">
                <div class="col-12 col-sm-9 col-lg-4">
                    <h3 class="d-flex justify-content-between">商品總金額: <span>${{$product->product_price * $qty}}</span></h3>
                    <h3 class="d-flex justify-content-between">運費總金額: <span id="delivery_price">$60</span></h3>
                    <h3 class="d-flex justify-content-between">總付款金額: <span>$<span id="subtotal">{{$product->product_price * $qty + 60}}</span></span> </h3>
                    <button type="submit" class="btn btn-danger">下訂單</button>
                </div>
            </div>
        </form>
    </div>
@endsection


@section('js')
    <script>
        const way = document.querySelector('#way');
        const tel = document.querySelector('#tel');
        const address = document.querySelector('#address');
        const pay_way_info = document.querySelector('#pay-way-info');
        const radioes = document.querySelectorAll('input[name="delivery"]');
        const pay_way_radioes = document.querySelectorAll('input[name="pay-way"]');
        const delivery_price = document.querySelector('#delivery_price');
        const sub_price = document.querySelector('#sub_price');
        const subtotal = document.querySelector('#subtotal');
        const subtotal_value = document.querySelector('#subtotal').textContent;

        radioes.forEach((radio) => {
            radio.addEventListener('change', () => {
                way.innerHTML = radio.dataset.way;
                delivery_price.innerHTML = '$'+radio.dataset.price;
                subtotal.innerHTML = Number(subtotal_value) + Number(radio.dataset.price) - 60;
            });
        });

        pay_way_radioes.forEach((radio) => {
            radio.addEventListener('change', () => {
                pay_way_info.innerHTML = radio.dataset.way;
            });
        });
    </script>
@endsection
