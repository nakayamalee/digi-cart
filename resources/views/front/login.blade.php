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
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <h3 class="mb-5 fw-bolder">登入</h3>
                <div class="mb-5 d-flex flex-wrap justify-content-between">
                    <label for="email">帳號:</label>
                    <input type="text" name="email" class="@error('email') is-invalid @enderror" id="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <div class="col-12"></div>
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                     @enderror
                </div>
                <div class="mb-5 d-flex justify-content-between">
                    <label for="password">密碼:</label>
                    <input type="password" class="@error('password') is-invalid @enderror" name="password" id="password" required autocomplete="current-password">
                </div>
                <div class="d-flex flex-wrap justify-content-between">
                    <button type="button" onclick="location.href='/addAcount';" class="btn btn-danger col-5 mb-3">加入會員</button>
                    <div class="col-2 mb-3"></div>
                    <button type="submit" class="btn btn-danger col-5 mb-3">登入</button>
                    <a href="/forget" class="text-dark col-12 text-end">忘記密碼?</a>
                </div>
            </form>
        </div>
    </div>
@endsection
