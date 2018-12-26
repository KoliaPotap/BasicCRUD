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

use App\Task;
use Illuminate\Http\Request;

/**
 * Вывести панель с задачами
 */
Route::get('/', function () {
  $title = 'Main Page';
  return view('all/mindex',compact('title'));
}) ->name('main');
Route::get('/allphoto', 'all@shownewphoto') ->name('allphoto');
Route::get('/profile/{id}', 'user@profile') ->name('profile');
Route::get('/upload',  function () {
  $title = 'Main Page';
  return view('user/upload',compact('title'));
}) ->name('upload');
Route::post('/upload', 'user@store_photo')->name('user.upload');

Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/editphoto/{id}', 'user@editphoto');
Route::get('show/{id}', 'all@viewphoto');
Route::delete('show/{id}', 'user@destroy');

Route::put('/editphoto/{id}', 'user@uploadafteredit')->name('user.uploadafedit');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
