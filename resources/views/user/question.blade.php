@extends('layouts.myport')

@section('title','Hp-Link')

@section('content')
    <div class="jumbotron jumbotron-fluid" style="background-image: url({{ asset('images/top3-725x500.jpg') }}); background-size:cover;">
        <div class="container">
            <h1 class="display-3">アンケート入力フォーム</h1>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-10">
                @if (count($errors) > 0)
                <div>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form action="/user/question/{id}" method="post">
                    @csrf
                    <h4>あなたについて教えてください</h4>
                    <div class="form-group">
                        <label for="age">1.年齢</label>
                        <div class="input-group">
                            <input type="text" name="age" class="form-control" id="age" value="{{old('age')}}" aria-describedby="basic-addon3">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon3">歳</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <labal for="gender">2.性別</label>       
                        <select class="custom-select" name="gender">
                            <option selected>選択してください</option>
                            <option value="male">男性</option>
                            <option value="femaile">女性</option>
                        </select>                       
                    </div>  
                    <div class="form-group">
                        <label for="userMail">3.メールアドレス</label>
                        <input type="text" name="userMail" class="form-control" id="userMail" value="{{old('userMail')}}">
                    </div>
                    <h4>今回ご利用された病院・施設についてお伺いします</h4>
                    <div class="form-group">
                        <label for="hospitalName">1.対象の病院・施設のIDを入力してください</label>
                        <h6>あなたが今回ご利用された {{ $hospital->hospitalName}} のIDは {{$hospital->id}} です。</h6>
                        <input type="text" name="hospital_id" class="form-control" id="hospital_id"> 
                    </div>
                    <div class="form-group">
                        <label for="nps">2.推奨度</label>
                        <h6>あなたは今回ご利用された病院・施設をどのくらい知人や友人に進めたいと思いますか？</h6>
                        <h6>※０点を全くお勧めしない、１０点を強くお勧めするとして０〜１０点でお答えください</h6>
                        <select class="custom-select" name="nps">
                            <option selected>0:全くお勧めしないー10:強くお勧めする</option>
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="free">3.自由回答欄</label>
                        <h6>今回ご利用された病院・施設について、何かご指摘やご意見などがありましたらご記入ください</h6>
                        <textarea class="form-control" id="free" rows="6" name="free" value="{{old('free')}}"></textarea>
                    <div class="form-group">
                        <div class="col-md-8">
                            <button type="submit" class="btn btn-primary">送信</button>
                        </div>
                    </div>
                </form>

                <br><h5>アンケートのご入力、ありがとうございました！！</h5>
            </div>
        </div>
    </div>
@endsection
                    
