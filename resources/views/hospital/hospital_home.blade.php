@extends('layouts.myport')

@section('title', 'Hp-Link')

@section('content')
    <div class="jumbotron jumbotron-fluid" style="background:url({{ asset('images/E146_goodjobishi_TP_V.jpg') }}); background-size:cover;">
        <div class="container">
            <h1 class="display-3">医療機関・施設管理画面</h1>
        </div>
    </div>

    <div class="py-4">
        <section id="news">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">お知らせ<h4>
                                <ul>
                                    @foreach ($messages as $message)
                                    <li>{{$message->date}} {{$message->newsText}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="py-4 pg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="card text-center">
                        <div class="card-body">
                            <h4 class="card-title">登録病院・施設一覧</h4>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">病院・施設ID</th>
                                        <th scope="col">病院・施設名</th>
                                        <th scope="col">アンケート結果はコチラ</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach(Auth::user()->hospitals as $hospital)
                                    <tr>
                                        <th scope="col">{{$hospital->id}}</th>
                                        <th>{{$hospital->hospitalName}}</th>
                                        <th><a class="btn btn-success" href="hospital/result/{{ $hospital->id }}" role="button">結果ページ</a></th>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card text-center">
                        <div class="card-body">
                            <h4 class="card-title">病院・施設登録は<br>コチラ</h4>
                            <p class="card-text">あなたの病院・施設を登録してアンケートを集めましょう</p>
                            <a class="btn btn-primary" href="/hospital/hospital_input" role="button">病院・施設登録フォーム</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection



