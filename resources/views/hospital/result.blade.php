@extends('layouts.myport')

@section('title', 'Hp-Link')

@section('content')
    <div class="jumbotron jumbotron-fluid" style="background:url( {{ asset('images/E146_goodjobishi_TP_V.jpg') }}); background-size:cover;">
        <div class="container">
            <h1 class="display-3">アンケート結果</h1>
        </div>
    </div>
    
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="py-4">
                    <div class="card text-center">
                        <div class="card-body">
                            @foreach($user_hospitals as $hospital)
                            <h4 class="card-title">{{$hospital->hospitalName}}</h4>
                            
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">病院・施設ID</th>
                                        <th scope="col">年齢</th>
                                        <th scope="col">性別</th>
                                        <th scope="col">推奨度</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($hospital->questions()->get() as $question)
                                    <tr>
                                        <th scope="col">{{$question->hospital_id}}</th>
                                        
                                        <td>{{$question->age}}</td>
                                        
                                        <td>{{$question->gender}}</td>
                                        
                                        <td>{{$question->nps}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>


                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">総数</th>
                                        <th scope="col">推奨者</th>
                                        <th scope="col">中立者</th>
                                        <th scope="col">批判者</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    <tr>
                                        <th scope="col">{{$hospital->npsScore()["cnt"]}}</th>
                                        <td>{{$hospital->npsScore()["p_cnt"]}}</td>
                                        <td>{{$hospital->npsScore()["m_cnt"]}}</td>
                                        <td>{{$hospital->npsScore()["n_cnt"]}}</td>
                                    </tr>
                                </tbody>

                                <tfoot>
                                    <tr>
                                        <th scope="col">NPS SCORE</th>
                                        <td colspan="3">{{$hospital->npsScore()["score"]}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="col">NPS SCORE（当サイト全体値）</th>
                                        <td colspan="3">{{$hospital->totalNpsScore()["total_score"]}}</td>
                                    </tr>
                                </tfoot>
                            </table>
                            @endforeach
                        </div>
                    </div></br>
                
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title text-center">自由回答一覧</h4>
                            @foreach($user_hospitals as $hospital)
                                <ul>
                                    @foreach($hospital->questions()->get() as $question)   
                                    <li>{{ $question->free}}</li>
                                    @endforeach
                                </ul>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="py-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <h4 class="card-title">NPSとは？</h4>
                            <p class="card-text">顧客ロイヤルティーの指標とされており、NPSが高いほど企業の利益が高くなると言われております。</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection