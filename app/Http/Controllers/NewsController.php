<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.news');
    }

    public function create(Request $request)
    {
        $this->validate($request, News::$rules);
        $news = new News;
        $form = $request->all();
        unset($form['_token']);
        $news->fill($form)->save();
        return redirect('user');

    }

}
