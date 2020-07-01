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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


Route::get('/series', 'SeriesContoller@index')->name('series.index');
Route::get('/series/create', 'SeriesContoller@create')->name('series.create')->middleware('autenticador');
Route::post('/series', 'SeriesContoller@store')->name('series.store')->middleware('autenticador');
Route::delete('/series/{id}', 'SeriesContoller@destroy')->name('series.destroy')->middleware('autenticador');

Route::get('/series/{serieId}/temporadas', 'TemporadasController@index')->name('temporadas.index');

Route::get('/temporada/{temporada}/episodios', 'EpisodiosController@index')->name('episodios.index');
Route::post('/temporadas/{temporada}/episodios/assistir', 'EpisodiosController@assistir')->name('episodios.assistir');


Route::get('/entrar', 'EntrarController@index')->name('login.index');
Route::post('/entrar', 'EntrarController@entrar')->name('login.entrar');
Route::get('/registrar', 'RegistroController@create')->name('registro.create');
Route::post('/registrar', 'RegistroController@store')->name('registro.store');

Route::get('/sair', function(){
     \Illuminate\Support\Facades\Auth::logout();
     return redirect('/entrar');
})->name('sair');
