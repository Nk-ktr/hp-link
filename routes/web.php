<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('user.user_home');
});

Route::get('/', function () {
    return redirect('user.user_home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'hospital_auth'],function () {
    Route::get('/hospital_home', 'Hospital\Hospitalcontroller@index')->name('user_id');
    Route::post('/hospital_home', 'Hospital\Hospitalcontroller@index')->name('user_id');
});

Route::get('/', function() {
    return view('user/user_home');
});
Route::get('/','UserController@index');

Route::get('/user/about','UserController@about');

Route::get('/user/hospitaldetails/{id}', 'UserController@show');

Route::get('/user/question/{id}', 'UserController@go');
Route::post('/user/question/{id}', 'UserController@create');


Route::get('hospital/hospital_input','Hospital\HospitalController@add');
Route::post('hospital/hospital_input','Hospital\HospitalController@create');

Route::get('hospital/result/{id}', 'Hospital\HospitalController@show');

Route::get('admin/news', 'NewsController@index');
Route::post('admin/news', 'NewsController@create');


