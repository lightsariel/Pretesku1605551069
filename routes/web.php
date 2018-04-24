<?php

Route::resource('krs', 'KrsController');
Route::resource('mahasiswa', 'MahasiswaController');
Route::resource('dosen', 'DosenController');
Route::resource('mktawar', 'MktawarController');
Route::resource('matakuliah', 'MatakuliahController');
Route::resource('openkrs', 'OpenkrsController');


Route::get('registrasi_krs', 'KrsController@registrasi_krs');
Route::post('store_krs', 'KrsController@store_krs');
Route::post('konfirmasi_krs', 'KrsController@konfirmasi_krs');
Route::get('view_approve_krs', 'KrsController@view_approve_krs');
Route::get('edit_approve_krs/{id_mhs}/{status}', 'KrsController@edit_approve_krs');
Route::post('approve_krs', 'KrsController@approve_krs');
Route::get('input_nilai/{id_mktawar}', 'KrsController@input_nilai');
Route::get('nilai_mk/', 'KrsController@nilai_mk');
Route::post('edit_nilai', 'KrsController@edit_nilai');
Route::get('khs', 'KrsController@khs');

Route::get('profil_mhs', 'MahasiswaController@profil_mhs');
Route::get('profil_dosen', 'DosenController@profil_dosen');
Route::get('profil_admin', 'OpenkrsController@profil_admin');

Auth::routes();
Route::view('/', 'auth/login');
