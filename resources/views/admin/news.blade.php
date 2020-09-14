@extends('layouts.myport')

@section('title', 'Hp-Link')

@section('content')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-3">お知らせ投稿ページ</h1>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="/admin/news" method="post">
                    @csrf
                    <div class="form-group row">
                        <label for="date" class="col-md-3">日付を入力</label>
                        <div class="col-md-9">
                            <input type="date" class="form-controll" value="<?php echo date('Y-m-d'); ?>" name="date" id="date" >
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="newsText" class="col-md-3">お知らせを入力</label>
                        <div class="col-md-9">
                            <input type="text" class="form-controll" name="newsText" id="newsText" >
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