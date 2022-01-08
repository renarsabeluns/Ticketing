<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\ReadXMLController;

#Route::get('xml',[ReadXMLController::class, 'read_xml'] function () {
#    return view('xml');
#});
Route::get('xml',[ReadXMLController::class, 'read_xml'])->middleware('auth');;
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

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

Auth::routes();


