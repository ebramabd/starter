<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|Route::get('/', function () {
    return view('welcome')->with('name','abram');
});


//Route::get('/', function () {
//    $data=[];
//    $data['name']='abram';
//    $data['id']=4;
//    return view('welcome',$data);
//});


Route::get('get','Front\UserController@getindex');

Route::get('/test1', function () {
    return view('test');
});

Route::get('/test2/{id}', function ($id) {
    return $id;
});
//Route::namespace('Front')->group(function(){
//    Route::get('users' , 'UserController@showUserName');
//});

//first way for use function  prefix
//Route::prefix('users')->group(function(){
//    Route::get('/' , function (){
//        return 'abram' ;
//    });
//});

//secend way for use function  prefix
Route::group(['prefix'=>'users'] , function(){
    Route::get('/' , function (){
        return 'abram' ;
    });
});
Route::group(['namespace'=>'Admin'] ,  function (){
    Route::get( 'abram' , 'SecondController@showString')->middleware('auth') ;
});

Route::resource('news', 'NewsController');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
*/



Auth::routes(['verify'=>TRUE]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
