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
    return view('welcome');
});

Route::get('/edit-profile', 'ProfileController@editpageindex')->middleware('auth')->name('edit-profile');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::post('update','ProfileController@update');

Route::get('users/{username}','ProfileController@index')->name('userpage');

Route::post('/addskill','ProfileController@addskill');

Route::get('/delskill/{id}','ProfileController@delskill');

Route::get('/delpersonalinfo/{id}','ProfileController@delpersonalinfo');

Route::post('/addpinfo','ProfileController@addpinfo');

Route::get('/deleduinfo/{id}','ProfileController@deleduinfo');

Route::post('/addeduinfo','ProfileController@addeduinfo'); 

Route::post('/editpinfo','ProfileController@editpinfo');

Route::post('/editeduinfo','ProfileController@editeduinfo');

Route::get('/delproinfo/{id}','ProfileController@delproinfo');

Route::post('/addproinfo','ProfileController@addproinfo'); 

Route::post('/editproinfo','ProfileController@editproinfo');

Route::get('/find-people', 'findpeopleController@index')->name('find-people'); 

Route::post('/navbar-search','findpeopleController@navbarsearch');

Route::post('/addproject','ProfileController@addproject'); 

Route::post('/editproject','ProfileController@editproject');

Route::get('/delproject/{id}','ProfileController@delproject');

Route::get('/delwork/{id}','ProfileController@delwork');

Route::post('/addwork','ProfileController@addwork');

Route::post('/editwork','ProfileController@editwork');
