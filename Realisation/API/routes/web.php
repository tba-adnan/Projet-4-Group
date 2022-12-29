<?php

use App\Http\Controllers\GroupesController;
use App\Http\Controllers\PreparationTacheController;
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

Route::resource('task', PreparationTacheController::class);
Route::get('exportexcel',[PreparationTacheController::class,'exportexcel'])->name('exportexcel');
Route::post('importexcel',[PreparationTacheController::class,'importexcel'])->name('importexcel');
route::get('/filter_bief',[PreparationTacheController::class,'filter_bief'])->name('filter_bief');
route::get('/searchtache',[PreparationTacheController::class,'search_tache'])->name('searchtache');
route::get('/generatepdf',[PreparationTacheController::class,'generatepdf'])->name('generate');

//Group Routes

Route::resource('group', GroupesController::class);
Route::controller(GroupesController::class)->group(function(){
Route::get('exportexcel','exportexcel')->name('exportexcel');
Route::post('importexcel','importexcel')->name('importexcel');
route::get('/filter_bief','filter_bief')->name('filter_bief');
route::get('/searchtache','search_tache')->name('searchtache');
route::get('/generatepdf','generatepdf')->name('generate');
});
