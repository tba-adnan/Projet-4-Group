<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PreparationTacheController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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



Route::resource('task', PreparationTacheController::class);
Route::get('/',[PreparationTacheController::class,'index'])->name('index');
Route::get('exportexcel',[PreparationTacheController::class,'exportexcel'])->name('exportexcel');
Route::post('importexcel',[PreparationTacheController::class,'importexcel'])->name('importexcel');
route::get('/filter_bief',[PreparationTacheController::class,'filter_bief'])->name('filter_bief');
route::get('/searchtache',[PreparationTacheController::class,'search_tache'])->name('searchtache');
route::get('/generatepdf',[PreparationTacheController::class,'generatepdf'])->name('generate');

