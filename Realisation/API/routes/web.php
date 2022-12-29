<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PreparationTacheController;

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


// Route::get('test', function () {
//     App::setLocale('en');
//    dd(App::getLocale());
// });



Route::group(['prefix'=>"{language}"],function(){
    // Route::get('/', function () {
    //     return view('welcome');
    // });

    // Route::resource('task', PreparationTacheController::class);
    Route::get('task',[PreparationTacheController::class,'index'])->name('task.index');
    Route::get('task/create',[PreparationTacheController::class, 'create'])->name('task.create');
    Route::post('task',[PreparationTacheController::class,'store'])->name('task.store');
    Route::get('task/{id}/edit',[PreparationTacheController::class,'edit'])->name('task.edit');
    Route::put('task/{id}',[PreparationTacheController::class,'update'])->name('task.update');
    Route::delete('task/{id}',[PreparationTacheController::class,'destroy'])->name('task.destroy');


    Route::get('exportexcel',[PreparationTacheController::class,'exportexcel'])->name('exportexcel');
    Route::post('importexcel',[PreparationTacheController::class,'importexcel'])->name('importexcel');
    route::get('/filter_bief',[PreparationTacheController::class,'filter_bief'])->name('filter_bief');
    route::get('/searchtache',[PreparationTacheController::class,'search_tache'])->name('searchtache');
    route::get('/generatepdf',[PreparationTacheController::class,'generatepdf'])->name('generate');

    
});

