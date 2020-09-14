<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $guarded = array('id');

    public static $rules = array(
        'hospital_id' => 'required',
        'age' => 'required',
        'gender' => 'required',
        'userMail' => 'required',
        'nps' => 'required',
    );

    public function hospital()
    {
        return $this->belongsTo('App\Hospital');
    }
    
}
