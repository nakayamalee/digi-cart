@extends('templates.template')

@section('title')
    會員中心
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('main')
    <div class="container pt-5">
        <div class="card col-12 p-5 text-center justify-content-center align-items-center">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <h3 class="mb-5 fw-bolder">加入會員</h3>
                <div class="mb-5 d-flex flex-wrap justify-content-between">
                    <label for="name" class="col-3 col-form-label text-start">暱稱:</label>


                    <input id="name" type="text" class="col-9 @error('name') is-invalid @enderror"
                        name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    <div class="col-12"></div>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>

                <div class="mb-5 d-flex flex-wrap justify-content-between">
                    <label for="email" class="col-3 col-form-label text-start">帳號:</label>
                    <input id="email" type="email" class="col-9 @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email">
                    <div class="col-12"></div>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>

                <div class="mb-5 d-flex flex-wrap justify-content-between">
                    <label for="password" class="col-3 col-form-label text-start">密碼:</label>


                    <input id="password" type="password" class="col-9 @error('password') is-invalid @enderror"
                        name="password" required autocomplete="new-password">
                    <div class="col-12"></div>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>

                <div class="mb-5 d-flex flex-wrap justify-content-between">
                    <label for="password-confirm" class="col-md-4 col-form-label text-start">密碼再確認:</label>
                    <input id="password-confirm" type="password" class="" name="password_confirmation" required
                        autocomplete="new-password">
                </div>

                <div class="d-flex flex-wrap justify-content-between">
                    <button type="submit" class="btn btn-danger col-5 mb-3">加入會員</button>
                    <button type="button" onclick="location.href='/signin';" class="btn btn-danger col-5 mb-3">登入</button>
                </div>
                {{-- <div class="mb-5 d-flex flex-wrap justify-content-between">
                    <label for="name">暱稱:</label>
                    <input id="name" type="text"  class="@error('name') is-invalid @enderror" name="name"
                        value="{{ old('name') }}"  required autocomplete="name" autofocus>
                    @error('name')
                        <div class="col-12"></div>
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-5 d-flex flex-wrap justify-content-between">
                    <label for="email">帳號:</label>
                    <input type="text" name="email" class="@error('email') is-invalid @enderror" id="email"
                        value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <div class="col-12"></div>
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-5 d-flex justify-content-between">
                    <label for="password">密碼:</label>
                    <input type="password" class="@error('password') is-invalid @enderror" name="password" id="password"
                        required autocomplete="current-password">
                </div>

                <div class="mb-5 d-flex justify-content-between">
                    <label for="password-confirm" class="col-5 text-start">密碼再確認:</label>
                    <input type="password" name="password-confirm" id="password-confirm" autocomplete="new-password" class="col-7" required>
                </div>

                <div class="d-flex flex-wrap justify-content-between">
                    <button type="submit" class="btn btn-danger col-5 mb-3">加入會員</button>
                    <div class="col-2 mb-3"></div>
                    <button type="button" onclick="location.href='/signin';" class="btn btn-danger col-5 mb-3">登入</button>
                </div> --}}
            </form>
        </div>
    </div>
@endsection
