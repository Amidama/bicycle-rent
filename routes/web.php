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

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/members', 'MemberController@index')->name('member');
Route::get('/members/create', 'MemberController@create')->name('member.create');
Route::get('/members/update/{id}', 'MemberController@edit')->name('member.edit');
Route::post('/member', 'MemberController@store')->name('member.store');
Route::post('/member/update', 'MemberController@update')->name('member.update');
Route::post('/member/delte', 'MemberController@delete')->name('member.delete');