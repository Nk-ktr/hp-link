@extends('layouts.myport')

@section('title', 'Hp-Link')

@section('content')
    <div class="jumbotron jumbotron-fluid" style="background-image: url({{ asset('images/unnamed.jpg') }}); background-size:cover;">
        <div class="container">
            <h1 class="display-3">Welcome Myport!!</h1>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="py-4">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title text-center">当WEBサイトについて</h3></br>
                            <img class="card-img-top rounded" src="{{ asset('images/setugu.jpg') }}" alt="医療接遇">
                            
                            <p class="lead">現在、医療の現場では患者様を中心に診療を行っていく流れが以前に比べ強くなっております。
                                そこで、登録された医療機関や施設に対して患者様に簡単なアンケートにお答え頂き医療現場
                                のスタッフと患者様の相互理解が図れればと思い、このWEBサイトを立ち上げました。</p>
                        </div>
                    </div>
                </div>
                
                <div class="py-4">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title text-center">CONTACT</h3></br>
                            <h4>電話番号</h4>
                            <p>000-999-999</p></br>
                            <h4>email （お問い合わせ）</h4>
                            <p>hoge@hoge.jp</p>
                        </div>
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

@endsection

