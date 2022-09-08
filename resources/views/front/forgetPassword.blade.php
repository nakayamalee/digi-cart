@extends('templates.template')

@section('title')
    忘記密碼
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('main')
    <div class="container pt-5">
        <div class="card col-12 p-5 text-center justify-content-center align-items-center">
            <h3 class="mb-5 fw-bolder">忘記密碼</h3>
            <div class="mb-5 d-flex justify-content-between">
                <label for="account">帳號:</label>
                <input type="text" name="account" id="account">
            </div>
            <div class="d-flex flex-wrap justify-content-between">
                <button type="submit" class="btn btn-danger col-5 mb-3">重設密碼</button>
                <div class="col-2 mb-3"></div>
                <button type="button" onclick="location.href='/signin'" class="btn btn-secondary col-5 mb-3">取消</button>
            </div>
        </div>
    </div>
@endsection
