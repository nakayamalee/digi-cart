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
                @foreach ($user_infos->user_order as $key => $item)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td><a href="/product-intro/{{ $item->product->id }}"><img src="{{ $item->product->img_path }}"
                                    title="{{ $item->product->product_name }}" alt="{{ $item->product->product_name }}"></a></td>
                        <td>${{ $item->product->product_price }}</td>
                        <td>{{ $item->product_qty }}</td>
                        <td class="text-primary">${{ $item->product_price * $item->product_qty }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div id="delivery-info" class="py-3 px-5 mb-3">
            <!-- 1:seven 2:hi-life 3.family 4.ok-mart 5.home-delivery -->
            <div class="d-flex justify-content-between info mb-3">
                <div>
                    訂單編號
                </div>
                <div>
                    {{ $user_infos->order_id }}
                </div>
            </div>
            <div class="d-flex justify-content-between info mb-3">
                <div>
                    付款方式
                </div>
                <div>
                    @if ($user_infos->pay_type == 1)
                        貨到付款
                    @elseif ($user_infos->pay_type == 2)
                        信用卡/金融卡
                    @elseif ($user_infos->pay_type == 3)
                        銀行轉帳
                    @endif
                </div>
            </div>
            <div class="d-flex justify-content-between info mb-3">
                <div class="d-flex align-items-center">
                    <span class="text-nowrap">寄送資訊</span>
                </div>
                <div class="text-end">
                    <div>
                        @if ($user_infos->delivery_type == 1)
                            7-ELEVEN
                        @elseif ($user_infos->delivery_type == 2)
                            萊爾富
                        @elseif ($user_infos->delivery_type == 3)
                            全家
                        @elseif ($user_infos->delivery_type == 4)
                            OK Mart
                        @elseif ($user_infos->delivery_type == 5)
                            宅配
                        @endif
                    </div>
                    {{-- <div>{{ Auth::user()->phone }}</div> --}}
                    <div class="d-flex flex-wrap justify-content-end">
                        <span>{{ $user_infos->user_address }}</span>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-between info mb-3">
                <div>
                    商品總金額
                </div>
                <div>
                    ${{ $user_infos->order_subtotal }}
                </div>
            </div>
            <div class="d-flex justify-content-between info mb-3">
                <div>
                    運費總金額
                </div>
                <div>
                    {{ $user_infos->delivery_bill }}
                </div>
            </div>
            <div class="d-flex justify-content-between info mb-3">
                <div class="d-flex align-items-center">
                    訂單總計
                </div>
                <div class="text-danger fs-1 fw-bolder">
                    ${{ $user_infos->order_subtotal+$user_infos->delivery_bill }}
                </div>
            </div>
            <div class="text-end">
                <button type="button" onclick="location.href='/';" class="btn btn-danger px-5 py-2">回到首頁</button>
            </div>
        </div>
    </div>
@endsection
