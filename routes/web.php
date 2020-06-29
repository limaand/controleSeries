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

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/series', 'SeriesContoller@index')->name('series.index');
Route::get('/series/create', 'SeriesContoller@create')->name('series.create');
Route::post('/series', 'SeriesContoller@store')->name('series.store');
Route::delete('/series/{id}', 'SeriesContoller@destroy')->name('series.destroy');

Route::get('/series/{serieId}/temporadas', 'TemporadasController@index')->name('temporadas.index');


