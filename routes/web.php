<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ReadXMLController;

#Route::get('xml',[ReadXMLController::class, 'read_xml'] function () {
#    return view('xml');
#});

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
    return view('home') ;
})->middleware('auth');


Route::resource('/tasks',TasksController::class)->middleware('auth');

Route::get('xml',[ReadXMLController::class, 'read_xml'])->middleware('auth');;
Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('users/profile','App\Http\Controllers\UsersController@edit')->middleware('auth')->name('users.edit-profile');
Route::put('users/profile','App\Http\Controllers\UsersController@update')->middleware('auth')->name('users.update-profile');
Route::middleware(['auth','admin'])->group(function(){
    Route::get('users','App\Http\Controllers\UsersController@index')->middleware('auth')->name('users.index');
    Route::post('users/{user}/make-admin','App\Http\Controllers\UsersController@makeAdmin')->name('users.make-admin');
    Route::post('users/{user}/make-employee','App\Http\Controllers\UsersController@makeEmployee')->name('users.make-employee');
});

Auth::routes();


