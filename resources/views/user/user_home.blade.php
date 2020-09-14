@extends('layouts.myport')

@section('title', 'Hp-Link')

@section('content')
    <div class="jumbotron jumbotron-fluid" style="background-image: url({{ asset('images/unnamed.jpg') }}); background-size:cover;">
        <div class="container">
            <h1 class="display-3">Welcome Myport!!</h1>
        </div>
    </div>

    <div class="py-4">
        <section id="news">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">お知らせ</h4>
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

    <div class="py-4 bg-light">
        <section id="hospital">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <div class="card text-center">
                            <div class="card-body">
                                <h4 class="card-title">病院・施設一覧</h4>
                                <table class="table table-hover">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">病院・施設名</th>
                                            <th scope="col">アクセス</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($items as $item)
                                        <tr>
                                            <th scope="row">{{$item->id}}</td>
                                            <td><a href="/user/hospitaldetails/{{ $item->id }}">{{$item->hospitalName}}</a></td>
                                            <td>{{$item->hospitalCity .$item->hospitalTown}}</td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card text-center">
                            <div class="card-body">
                                <h4 class="card-title">病院・施設職員の方</h4>
                                <p class="card-text">あなたも病院や施設を登録してみませんか？</p>
                                @guest                                       
                                    <a class="card-link" href="{{ route('login') }}">{{ __('ログイン') }}</a>                                                                          
                                    @if (Route::has('register'))
                                    <a class="card-link" href="{{ route('register') }}">{{ __('登録') }}</a>
                                    @endif
                                @else

                                @endguest
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    
@endsection




