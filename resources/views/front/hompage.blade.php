@extends('templates.template')

@section('title')
    首頁
@endsection

@section('css')
    <link rel="stylesheet" href="{{  asset('css/hompage.css') }}">
    <style>
        main{
            background-image: url({{ asset('img/ocean.jpg') }});
        }
    </style>
@endsection

@section('main')
    <div class="w-100 h-100 position-relative">
        <h1 class="position-absolute text-center fs-1 text-white fw-bolder text-uppercase">Welcome @auth,{{Auth::user()->name}}@endauth
        </h1>
    </div>
@endsection
