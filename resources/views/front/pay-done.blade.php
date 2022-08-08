@extends('templates.template')

@section('title')
    訂單完成
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/pay.css') }}">
@endsection

@section('main')
    <div class="container pt-5">
        <div class="text-center text-success mb-5">
            <i class="bi bi-check-circle"></i>
            <div class="fw-bolder fs-1">
                訂單完成
            </div>
        </div>
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
        <div id="delivery-info" class="py-3 px-5 mb-3">
            <!-- 1:seven 2:hi-life 3.family 4.ok-mart 5.home-delivery -->
            <div class="d-flex justify-content-between info mb-3">
                <div>
                    訂單編號
                </div>
                <div>
                    HE123456789
                </div>
            </div>
            <div class="d-flex justify-content-between info mb-3">
                <div>
                    付款方式
                </div>
                <div>
                    信用卡/金融卡
                </div>
            </div>
            <div class="d-flex justify-content-between info mb-3">
                <div class="d-flex align-items-center">
                    <span class="text-nowrap">寄送資訊</span>
                </div>
                <div class="text-end">
                    <div>7-ELEVEN</div>
                    <div>(+886)123456789</div>
                    <div class="d-flex flex-wrap justify-content-end">
                        <span>402 台中市</span><span>南區復興路二段74-8號</span>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-between info mb-3">
                <div>
                    商品總金額
                </div>
                <div>
                    $1000
                </div>
            </div>
            <div class="d-flex justify-content-between info mb-3">
                <div>
                    運費總金額
                </div>
                <div>
                    $60
                </div>
            </div>
            <div class="d-flex justify-content-between info mb-3">
                <div class="d-flex align-items-center">
                    訂單金額
                </div>
                <div class="text-danger fs-1 fw-bolder">
                    $1,060
                </div>
            </div>
            <div class="text-end">
                <button type="submit" class="btn btn-danger px-5 py-2">回到首頁</button>
            </div>
        </div>
    </div>
@endsection
