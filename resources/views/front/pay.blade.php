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
                    <td><a href="/product_intro.html"><img src="./img/gorushi.jpg" alt=""></a></td>
                    <td>$500</td>
                    <td>1</td>
                    <td class="text-primary">$500</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td><a href="/product_intro.html"><img src="./img/gorushi.jpg" alt=""></a></td>
                    <td>$500</td>
                    <td>1</td>
                    <td class="text-primary">$500</td>
                </tr>
            </tbody>
        </table>
        <div id="delivery-info" class="border py-3 px-5 mb-3">
            <!-- 1:seven 2:hi-life 3.family 4.ok-mart 5.home-delivery -->
            <input type="radio" name="delivery" hidden checked id="seven" value="1" data-way="7-ELEVEN">
            <label for="seven" class="w-100">
                <div class="d-flex flex-nowrap border mb-3">
                    <div class="delivery border-end"></div>
                    <div class="d-flex w-100 px-3 py-2">
                        <div class="me-auto">7-ELEVEN</div>
                        <div class="">$60</div>
                    </div>
                </div>
            </label>
            <input type="radio" name="delivery" hidden id="hi-life" value="2" data-way="萊爾富">
            <label for="hi-life" class="w-100">
                <div class="d-flex flex-nowrap border mb-3">
                    <div class="delivery border-end"></div>
                    <div class="d-flex w-100 px-3 py-2">
                        <div class="me-auto">萊爾富</div>
                        <div class="">$50</div>
                    </div>
                </div>
            </label>
            <input type="radio" name="delivery" hidden id="family" value="3" data-way="全家">
            <label for="family" class="w-100">
                <div class="d-flex flex-nowrap border mb-3">
                    <div class="delivery border-end"></div>
                    <div class="d-flex w-100 px-3 py-2">
                        <div class="me-auto">全家</div>
                        <div class="">$60</div>
                    </div>
                </div>
            </label>
            <input type="radio" name="delivery" hidden id="ok-mart" value="4" data-way="OK Mart">
            <label for="ok-mart" class="w-100">
                <div class="d-flex flex-nowrap border mb-3">
                    <div class="delivery border-end"></div>
                    <div class="d-flex w-100 px-3 py-2">
                        <div class="me-auto">OK Mart</div>
                        <div class="">$45</div>
                    </div>
                </div>
            </label>
            <input type="radio" name="delivery" hidden id="home-delivery" value="5" data-way="宅配">
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
                <select name="city" id="city" class="col-6 p-2">
                    <option>縣市</option>
                </select>
                <input type="text" class="col-6 p-2" name="postal-code" placeholder="郵遞區號">
            </div>
            <input type="text" class="w-100 p-2 mb-3" name="address" placeholder="區,街道,巷弄,門號,樓層">
            <div class="d-flex">
                <span class="me-3">寄送資訊:</span>
                <div>
                    <div id="way">7-ELEVEN</div>
                    <div id="tel">(+886)123456789</div>
                    <div id="address">404 北區 文化路777號</div>
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
                <h3 class="d-flex justify-content-between">商品總金額: <span>$500</span></h3>
                <h3 class="d-flex justify-content-between">運費總金額: <span>$60</span></h3>
                <h3 class="d-flex justify-content-between">總付款金額: <span>$560</span></h3>
                <button type="submit" class="btn btn-danger">下訂單</button>
            </div>
        </div>
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

        radioes.forEach((radio) => {
            radio.addEventListener('change', () => {
                way.innerHTML = radio.dataset.way;
            });
        });

        pay_way_radioes.forEach((radio) => {
            radio.addEventListener('change', () => {
                pay_way_info.innerHTML = radio.dataset.way;
            });
        });
    </script>
@endsection
