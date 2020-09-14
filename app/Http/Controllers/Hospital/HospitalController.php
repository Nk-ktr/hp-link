<?php

namespace App\Http\Controllers\Hospital;

use App\Http\Controllers\Controller;
use App\Hospital;
use App\Question;
use App\User;
use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class HospitalController extends Controller
{
    public function index(Request $request) 
    {
        $user_id = Auth::id();
        $messages = News::all();
        return view('hospital.hospital_home', compact('user_id'), ['messages' => $messages]);  
    }

    public function add(Request $request)
    {
        return view('hospital.hospital_input');
    }

    public function create(Request $request) 
    {
        $this->validate($request, Hospital::$rules);
        $hospital = new Hospital;
        $form = $request->all();
        unset($form['_token']);
        $hospital->user_id = Auth::user()->id;
        $hospital->fill($form)->save();

        return redirect('hospital_home');
    }

    public function show($id)
    {
        $data = $id;
        $user_hospitals = Hospital::where('id', $data)->get();
        $total_hospitals = Hospital::all();
        return view('hospital.result', ['user_hospitals' => $user_hospitals, 'total_hospitals' => $total_hospitals]);   
    }

    public function go($id)
    {
        $users = User::find($id);
        return view('hospital.hospital_home',['users' => $users]);
    }
}
