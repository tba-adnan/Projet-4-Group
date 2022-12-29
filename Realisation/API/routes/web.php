<?php

use App\Http\Controllers\PreparationTacheController;
use App\Http\Controllers\ApprenantPreparationBriefController;
use App\Http\Controllers\GroupesApprenantController;
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



Route::resource('assign', GroupesApprenantController::class);
Route::get('/filter_par_group',[GroupesApprenantController::class,'filter_par_group'])->name('filter_par_group');

Route::resource('add', ApprenantPreparationBriefController::class);
