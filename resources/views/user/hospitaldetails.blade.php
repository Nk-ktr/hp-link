@extends('layouts.myport')

@section('title', 'Hp-Link')

@section('content')
    <div class="jumbotron jumbotron-fluid" style="background-image: url({{ asset('images/medi.jpg') }}); background-size:cover;">
        <div class="container">
            <h1 class="display-3">病院・施設詳細</h1>
        </div>
    </div>

    <div class="container text-center">
        <div class="row">
            <div class="col-md-10">
                <table class="table">
                    <tbody>
                        <tr>
                            <th>病院・施設名</th>
                            <td>{{ $hospital->hospitalName }}</td>
                        </tr>
                        <tr>
                            <th>住所</th>
                            <td>{{ $hospital->hospitalCity .$hospital->hospitalTown}}</td>
                        </tr>
                        <tr>
                            <th>電話番号</th>
                            <td>{{ $hospital->hospitalTel }}</td>
                        </tr>
                        <tr>
                            <th>診療科一覧</th>
                            <td>{{ $hospital->hospitalSection}}</td>
                        </tr>
                        <tr>
                            <th>病院・施設より一言</th>
                            <td>{{ $hospital->hospitalIntroduce}}</td>
                        </tr>
                        <tr>
                            <th></th>
                            <td><a href="/user/question/{{ $hospital->id}}">アンケート入力はこちら！</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection


