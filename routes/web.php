<?php
use App\Services\FacebookServiceFacade;
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
	// $fb = new App\Services\FacebookService();
	// $facebook =  $fb->getAll();
	$facebook = FacebookServiceFacade::getAll();
	//dd($facebook);
    return view('welcome')->with('facebook',$facebook);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('dashboard');


Route::get('api/authuser','Api\UserController@authuser');
Route::get('api/search-user','Api\UserController@searchuser');

//Song List
Route::get('api/songlist','SingerController@search');
Route::post('/image/store', 'ImageController@store');
Route::post('/password/update','Api\AuthUserUpdate@passwordchange');

Route::get('facade/information','HomeController@facede');

//You user refresh page but content is from vue
Route::get('{path}', "HomeController@index")->where('path','([A-z\d-\/_.]+)?');
