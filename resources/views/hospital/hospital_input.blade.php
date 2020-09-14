@extends('layouts.myport')

@section('title', 'Hp-Link')

@section('content')
    <div class="jumbotron jumbotron-fluid" style="background-image: url({{ asset('images/human.jpg') }}); background-size:cover;">
        <div class="container">
            <h1 class="display-3">病院・施設データ入力</h1>
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
                <form action="/hospital/hospital_input" method="post">
                    @csrf
                    <div class="form-group row">
                        <label for="hospitalName" class="col-md-2 col-form-label">医療機関・施設名</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="hospitalName" name="hospitalName" placeholder="医療機関・施設名を入力" value="{{old('hospitalName')}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="hospitalCity" class="col-md-2 col-form-label">都道府県</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="hospitalCity" name="hospitalCity" value="{{old('hospitalCity')}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="hospitalTown" class="col-md-2 col-form-label">市町村</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="hospitalTown" name="hospitalTown" value="{{old('hospitalTown')}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="hospitalTel" class="col-md-2 col-form-label">電話番号</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="hospitalTel" name="hospitalTel" value="{{old('hospitalTel')}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="hospitalSection" class="col-md-2 col-form-label">診療科</label>
                        <div class="col-md-8">
                            <textarea class="form-control" id="hospitalSection" rows="4" name="hospitalSection" placeholder="診療されている科を全てご記入ください" value="{{old('hospitalSection')}}"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="hospitalIntroduce" class="col-md-2 col-form-label">病院・施設紹介</label>
                        <div class="col-md-8">
                            <textarea class="form-control" id="hospitalIntroduce" rows="4" name="hospitalIntroduce" placeholder="あなたの病院・施設について一言お願いします" value="{{old('hospitalIntroduce')}}"></textarea>
                        </div>
                    </div>
                    <div class="form-group row justify-content-end">
                        <div class="col-md-8">
                            <button type="submit" class="btn btn-primary">送信</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
