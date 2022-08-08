@extends('templates.template')

@section('title')
    會員中心
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/customer.css') }}">
@endsection

@section('main')
    <div class="conatiner-fulid px-0 pt-5 px-sm-5">
        <h1>帳號資料</h1>
        <div class="row g-3 m-0 justify-content-evenly">
            <div class="card mb-3 col-12 p-5">
                <div class="text-center d-flex justify-content-center align-items-center mb-3">
                    <label for="nickName" class="fs-1 me-3">暱稱:</label>
                    <input type="text" name="nickName" id="nickName">
                </div>
                <div class="d-flex justify-content-center">
                    <button type="button" class="btn card-btn fs-3 px-3 py-1 text-white me-5">修改</button>
                    <button type="button" class="btn card-btn fs-3 px-3 py-1 text-white bg-secondary">登出</button>
                </div>
            </div>
        </div>
        <h1>過去訂單</h1>
        <div class="row g-3 m-0 justify-content-evenly">
            <div class="card mb-3 col-12 p-0 p-sm-5">
                <table class="table table-striped">
                    <thead>
                        <tr class="border">
                            <th scope="col">#</th>
                            <th scope="col">訂單成立時間</th>
                            <th scope="col">訂單編號</th>
                            <th scope="col">訂單金額</th>
                            <th scope="col">訂單狀態</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>2022/07/19</td>
                            <td>HES123456789</td>
                            <td>NT$600</td>
                            <td class="text-primary">配送中</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>2022/07/19</td>
                            <td>HES123456789</td>
                            <td>NT$600</td>
                            <td class="fw-bolder text-secondary">未付款</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>2022/07/19</td>
                            <td>HES123456789</td>
                            <td>NT$600</td>
                            <td class="fw-bolder text-danger">已取消</td>
                        </tr>
                        <tr>
                            <th scope="row">4</th>
                            <td>2022/07/19</td>
                            <td>HES123456789</td>
                            <td>NT$600</td>
                            <td class="text-success">已送達</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
