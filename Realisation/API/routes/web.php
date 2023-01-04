<?php

use App\Http\Controllers\GroupesController;
use App\Http\Controllers\PreparationTacheController;
use Illuminate\Support\Facades\Route;
use App\Models\PreparationTache;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',[PreparationTacheController::class,'index'])->name('index');
Route::resource('task', PreparationTacheController::class);
Route::get('exportexcel',[PreparationTacheController::class,'exportexcel'])->name('exportexcel');
Route::post('importexcel',[PreparationTacheController::class,'importexcel'])->name('importexcel');
route::get('/filter_bief',[PreparationTacheController::class,'filter_bief'])->name('filter_bief');
route::get('/searchtache',[PreparationTacheController::class,'search_tache'])->name('searchtache');
route::get('/generatepdf',[PreparationTacheController::class,'generatepdf'])->name('generate');
// Route::get('/convert-to-json', function () {
//     return PreparationTache::paginate(3);
// });

//Group Routes

Route::resource('group', GroupesController::class);
Route::controller(GroupesController::class)->group(function(){
Route::get('exportexcel','exportexcel')->name('exportexcel');
Route::post('importexcel','importexcel')->name('importexcel');
route::get('/filter_formatuer','filter_formatuer')->name('filter_formatuer');
route::get('/search_group','search_group')->name('search_group');
route::get('/generatepdf','generatepdf')->name('generate');
});
