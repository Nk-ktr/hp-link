<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    protected $guarded = array('id');

    public static $rules = array(
        'hospitalName' => 'required',
        'hospitalCity' => 'required',
        'hospitalTown' => 'required',
        'hospitalTel' => 'required',
        'hospitalSection' => 'required',
        'hospitalIntroduce' => 'required'
    );

    public function getData() {
        return $this->id .':' .$this->hospitalName ."/" .$this->hospitalCity .$this->hospitalTown;
    }

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function questions()
    {
        return $this->hasMany('App\Question');
    }

    public function npsScore()
    {
        $score = 0;
        $cnt = 0;
        $p_cnt = 0;
        $m_cnt = 0;
        $n_cnt = 0;

        foreach($this->questions()->get() as $question)
        {
            $cnt += 1;
            if($question->nps >= 9){
                $p_cnt += 1;
            }elseif($question->nps >= 7){
                $m_cnt += 1;
            }else{
                $n_cnt += 1;
            }
            $score = $p_cnt / $cnt * 100 - $n_cnt / $cnt * 100;
        
        }
        return ["score" => $score, "cnt" => $cnt, "p_cnt" => $p_cnt, "m_cnt" => $m_cnt, "n_cnt" => $n_cnt];
    }

    public function totalNpsscore()
    {
        $total_score = 0;
        $cnt = 0;
        $p_cnt = 0;
        $m_cnt = 0;
        $n_cnt = 0;

        $p_cnt_array = [];
        $m_cnt_array = [];
        $n_cnt_array = [];

        foreach($this->questions()->get() as $question)
        {
            $cnt += 1;
            
            if($question->nps >= 9){
                $p_cnt += 1;
                array_push($p_cnt_array,$p_cnt);
            }elseif($question->nps >= 7){
                $m_cnt += 1;
                array_push($m_cnt_array,$m_cnt);
            }else{
                $n_cnt += 1;
                array_push($n_cnt_array,$n_cnt);
            }

        }
        
        $total_cnt = $cnt;
        $total_p_cnt = array_sum($p_cnt_array);
        $total_m_cnt = array_sum($m_cnt_array);
        $total_n_cnt = array_sum($n_cnt_array); 
        
        if($total_cnt != 0){
            $total_score = $total_p_cnt / $total_cnt * 100 - $total_n_cnt / $total_cnt * 100;    
        }

        


        return ["total_score" => $total_score, "total_cnt" => $total_cnt, "total_p_cnt" => $total_p_cnt, "total_m_cnt" => $total_m_cnt, "total_n_cnt" => $total_n_cnt];

        
    }
}
