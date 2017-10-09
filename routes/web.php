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

Route::view('/', 'welcome');

Route::view('/api', 'api.index', ['title' => 'Directory API Documentation'])->name('api');
Route::view('/api/v1', 'api.v1.index', ['title' => 'Directory API v1 Documentation'])->name('api.v1');
