<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth;
use App\Hospital;
use App\Question;
use App\News;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $items = Hospital::all();
        $messages = News::all();
        return view('user.user_home',['items' => $items, 'messages' => $messages]);
    }

    public function about()
    {
        return view('user.about');
    }

    public function show($id)
    {
        $hospital = Hospital::find($id);
        return view('user.hospitaldetails',['hospital' => $hospital]);
    }

    public function go($id)
    {
        $hospital = Hospital::find($id);
        return view('user.question', ['hospital' => $hospital]);
    }

    public function create(Request $request)
    {
        $this->validate($request, Question::$rules);
        $question = new Question;
        $form = $request->all();
        unset($form['_token']);
        $question->fill($form)->save();
        return redirect('user/');
    }


}
