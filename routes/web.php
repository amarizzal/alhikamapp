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

// auth login admin
Route::get('/', "AuthController@index")->name('admin.login');
Route::post('/', 'AuthController@login');
Route::post('/logout', 'AuthController@logout')->name('admin.logout');

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function() {
    Route::resource('santris', 'SantriController');
    Route::post('santris/upload', 'SantriController@uploadExcel')->name('santri.upload');

    Route::resource('users', 'UserController');

    Route::resource('roles', 'RoleController');

    Route::resource('kegiatans', 'KegiatanController');

    Route::resource('jadwalKegiatans', 'JadwalKegiatanController');

    Route::resource('presensis', 'PresensiController')->except(['edit']);
    Route::get('/presensis/{tgl}/{nik}/edit', 'PresensiController@edit')->name('presensis.edit');

    Route::resource('dendas', 'DendaController');

    Route::resource('dendaDetails', 'DendaDetailController')->except(['update']);
    Route::put('/dendas/{nik}/{id_denda_detail}', 'DendaDetailController@update')->name('dendaDetails.update');

    Route::resource('dashboard', 'DashboardController')->only(['index']);

    Route::get('perizinan', 'PerizinanController@index')->name('perizinan.index');
    Route::post('/perizinan', 'PerizinanController@store')->name('perizinan.store');
});

Route::group(['prefix' => 'santri', 'middleware' => 'santri'], function() {
    Route::get('/dashboard', 'UserSantriController@index')->name('userSantri.dashboard');
    Route::get('/pengumuman', 'UserSantriController@pengumuman')->name('userSantri.pengumuman');
    Route::get('/komplain', 'UserSantriController@komplain')->name('userSantri.komplain');
    Route::post('/komplain', 'UserSantriController@komplainStore');
});


Route::resource('pengumumen', 'PengumumanController');

Route::resource('komplains', 'KomplainController');
