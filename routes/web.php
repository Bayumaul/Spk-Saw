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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/testDataCombinations', 'CombinationsController@index')->name('kombinasi');
Route::get('/testDataCombination', 'CombinationController@index')->name('kombinasi');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/perhitungan','PerhitunganController@index')->name('perhitungan');
//Route module for kriteria
Route::prefix('/kriteria')->group(function ()
{
    Route::get('/', 'KriteriaController@index')->name('kriteria');
    Route::get('/tambah', 'KriteriaController@create')->name('kriteria.tambah');
    Route::post('/tambah', 'KriteriaController@store')->name('kriteria.simpan');
    Route::get('/edit/{id}', 'KriteriaController@edit')->name('kriteria.edit');
    Route::post('/edit/{id}', 'KriteriaController@update')->name('kriteria.update');
    Route::post('/hapus/{id}', 'KriteriaController@destroy')->name('kriteria.hapus');
});

//Route module for crip
Route::prefix('/crip')->group(function ()
{
    Route::get('/', 'CripController@index')->name('crip');
    Route::get('/tambah', 'CripController@create')->name('crip.tambah');
    Route::post('/tambah', 'CripController@store')->name('crip.simpan');
    Route::get('/edit/{id}', 'CripController@edit')->name('crip.edit');
    Route::post('/edit/{id}', 'CripController@update')->name('crip.update');
    Route::post('/hapus/{id}', 'CripController@destroy')->name('crip.hapus');
});

//Route module for alternatif
Route::prefix('/alternatif')->group(function ()
{
    Route::get('/', 'AlternatifController@index')->name('alternatif');
    Route::get('/tambah', 'AlternatifController@create')->name('alternatif.tambah');
    Route::post('/tambah', 'AlternatifController@store')->name('alternatif.simpan');
//    Route::get('/{id}', 'AlternatifController@show')->name('alternatif.nilai.tambah');
    Route::get('/edit/{id}', 'AlternatifController@edit')->name('alternatif.edit');
    Route::post('/edit/{id}', 'AlternatifController@update')->name('alternatif.update');
    Route::post('/hapus/{id}', 'AlternatifController@destroy')->name('alternatif.hapus');
});

//Route module for nilai
Route::prefix('/nilai')->group(function ()
{
    Route::get('/', 'NilaiController@index')->name('nilai');
    Route::get('/{id}', 'NilaiController@create')->name('nilai.tambah');
    Route::post('/{id}', 'NilaiController@store')->name('nilai.simpan');
    Route::get('/edit/{id}', 'NilaiController@edit')->name('nilai.edit');
    Route::post('/edit/{id}', 'NilaiController@update')->name('nilai.update');
    Route::post('/hapus/{id}', 'NilaiController@destroy')->name('nilai.hapus');
});