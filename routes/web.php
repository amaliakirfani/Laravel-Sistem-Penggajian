<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/division','DivisionController@index');
Route::get('/division/create','DivisionController@create');
Route::post('/division/create','DivisionController@create');
Route::get('/division/delete/{division_id}','DivisionController@delete');
Route::get('/division/edit/{division_id}','DivisionController@edit');
Route::post('/division/update','DivisionController@update');

Route::get('/position','PositionController@index');
Route::get('/position/create','PositionController@create');
Route::post('/position/create','PositionController@create');
Route::get('/position/delete/{position_id}','PositionController@delete');
Route::get('/position/edit/{position_id}','PositionController@edit');
Route::post('/position/update','PositionController@update');

Route::get('/employee','EmployeeController@index');
Route::get('/employee/create','EmployeeController@create');
Route::post('/employee/create','EmployeeController@create');
Route::get('/employee/delete/{employee_id}','EmployeeController@delete');
Route::get('/employee/edit/{employee_id}','EmployeeController@edit');
Route::post('/employee/update','EmployeeController@update');