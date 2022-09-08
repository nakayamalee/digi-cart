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
                    <input type="text" value="{{ Auth::user()->name }}" id="nickName">
                </div>
                <div class="d-flex justify-content-center">
                    <button type="button" class="btn card-btn fs-3 px-3 py-1 text-white me-5"
                        onclick="changeName()">修改</button>
                    <a class="btn card-btn fs-3 px-3 py-1 text-white bg-secondary" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        登出
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
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
                        @if ($orders)
                            @foreach ($orders as $key=>$item)
                                <tr>
                                    <th scope="row">{{ $key+1 }}</th>
                                    <td>{{ $item->created_at->toDateString() }}</td>
                                    <td>HES123456789</td>
                                    <td>NT$600</td>
                                    <td class="text-primary">配送中</td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        function changeName() {
            const name = document.querySelector('#nickName').value;
            const nameData = new FormData();
            nameData.append('_token', '{{ csrf_token() }}'); //TOKEN
            nameData.append('newName', name);
            fetch('/customer-center/change-name', {
                    method: 'POST',
                    body: nameData,
                }).then(function(response) {
                    return response.text(); //接收資料
                })
                .then(function(datas) {
                    console.log(datas);
                    if (datas === 'save') {
                        Swal.fire({
                            icon: 'success',
                            title: '修改成功!',
                            confirmButtonText: '繼續'
                        })
                    }else if(datas === 'same'){
                        Swal.fire({
                            icon: 'question',
                            title: '暱稱無更動，請再次確認',
                            confirmButtonText: '繼續'
                        })
                    }else{
                        Swal.fire({
                            icon: 'error',
                            title: '修改失敗!',
                            confirmButtonText: '繼續'
                        })
                    }
                })
        }
    </script>
@endsection
