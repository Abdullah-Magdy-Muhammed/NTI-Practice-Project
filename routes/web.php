<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});
// Language Routes .....

Route::get('Lang/{lang}',function($lang){
    if($lang == 'ar') {
        session()->put('lang','ar');
    } else {
        session()->put('lang','en');
    }
    return back();
});

// Student Routes ......

Route::get('Student/create','studentController@create');
Route::post('Student/store','studentController@store');
Route::get('Student/','studentController@index')->middleware('studentCheck');
Route::get('Student/delete/{id}','studentController@delete');
Route::get('Student/edit/{id}','studentController@edit');
Route::post('Student/update/{id}','studentController@update');


Route::resource('Users','studentResourceController');
/*
    /Users (get) 
    /Users/create (get)
    /Users (post)
    /Users/{id}/edit (get)
    /Users/{id}  (put)
    /Users/{id}  (get)
    /Users/{id}  (delete)
*/


Route::get('Student/login','studentResourceController@login');
Route::post('Student/dologin','studentResourceController@dologin');
Route::get('Student/logout','studentResourceController@logout');

Route::get('ApiLogin',function(){
    return response()->json(['message'=>'Login First']);
})->name('login');

Route::get('login','studentController@login');
Route::post('dologin','studentController@dologin');
Route::get('logout','studentController@logout');






/*
    Route::view('Register','create');

    Route::post('doRegister',function () {
        echo "welcome from frontend";

    });


    Route::get('student/{name}/{id?}',function ($name,$id = null) {
        echo "student data :".$id. 'name :'.$name;

    })->where('name','[a-zA-Z]+');

    Route::get('Article/{id?}',function ($id) {
        echo "Article data :".$id;

    })->where('name','[a-zA-Z]+');

Route::get('Message','studentController@message');   

Route::get('Register','studentController@createView');   

Route::post('store','studentController@store');   

Route::view('Profile','StudentProfile');   

Route::view('session','session');


Route::post('doRegister',function () {
    echo "welcome from frontend";

});
*/