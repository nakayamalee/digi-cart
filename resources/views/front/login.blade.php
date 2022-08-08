@extends('templates.template')

@section('title')
    會員登入
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('main')
    <div class="container pt-5">
        <div class="card col-12 p-5 text-center justify-content-center align-items-center">
            <h3 class="mb-5 fw-bolder">登入</h3>
            <div class="mb-5 d-flex justify-content-between">
                <label for="account">帳號:</label>
                <input type="text" name="account" id="account">
            </div>
            <div class="mb-5 d-flex justify-content-between">
                <label for="password">密碼:</label>
                <input type="text" name="password" id="password">
            </div>
            <div class="d-flex flex-wrap justify-content-between">
                <button class="btn btn-danger col-5 mb-3">加入會員</button>
                <div class="col-2 mb-3"></div>
                <button class="btn btn-danger col-5 mb-3">登入</button>
                <a href="#" class="text-dark col-12 text-end">忘記密碼?</a>
            </div>
        </div>
    </div>
@endsection
