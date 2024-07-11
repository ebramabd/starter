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

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
] , function() {


    Route::group(['prefix'=>'offer'] , function (){

        Route::get('crud','CrudController@create') ;
        Route::post('create','CrudController@store') ->name('offer.create');


        Route::get('/edit/{offer_id}','CrudController@edit') ;
        Route::post('/update/{id}','CrudController@updateOffer')->name('offer.update');
        Route::get('getAll','CrudController@getAll') ;
        Route::get('delete/{id}','CrudController@delete') ->name('offer.delete');


    });
    Route::get('youtube','CrudController@events') ;

});

Route::group(['prefix'=>'offer_ajax'] , function (){
    Route::get('create','AjaxOfferController@create');//path load form view
    Route::post('store','AjaxOfferController@store')->name('ajax.offer.store');

    Route::get('all','AjaxOfferController@all') ->name('ajax.offer.all');
    Route::post('delete','AjaxOfferController@delete') ->name('ajax.offer.delete');

});

Route::get('/test1', function () {
    return view('test');
})->name('test');

//start middelwere

Route::group(['middleware'=>'CheckAge'] , function (){
    Route::get('adults','Auth\CustomAuthController@adults');

});

Route::get('site','Auth\CustomAuthController@site')->middleware('auth')->name('site');
Route::get('admin','Auth\CustomAuthController@admin')->middleware('auth:admin')->name('admin');


Route::get('admin/login','Auth\CustomAuthController@adminLogin')->name('admin.login');
Route::post('admin/login','Auth\CustomAuthController@checkAdminLogin')->name('login.save.login');

//end


Route::get('hasOne','Relation\RelationsController@hasOneRelation');
Route::get('get_has_phone','Relation\RelationsController@getHasPhone');
Route::get('get_has_not_phone','Relation\RelationsController@getHasNotPhone');
Route::get('get_hospital','Relation\RelationsController@getHospital');


Route::get('hospital','Relation\RelationsController@hospital');
Route::get('hospitalDelete/{id}','Relation\RelationsController@hospitalDelete')->name('hospital.delete');

Route::get('doctor/{id}','Relation\RelationsController@doctor')->name('doctor');


Route::get('doctorService','Relation\RelationsController@doctorServiceweb');

Route::get('doctorServiceShow/{idDoctor}','Relation\RelationsController@doctorServiceShow')->name('doctor.services.show');
