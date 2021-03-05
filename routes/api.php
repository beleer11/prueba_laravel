<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/** EMPLOYEES */
Route::get('employees/index', 'EmployeesController@index')
    ->name('employees.index');

Route::post('employees/store', 'EmployeesController@store')
    ->name('employees.store');

Route::get('employees/show/{id}', 'EmployeesController@show')
    ->name('employees.show');

Route::get('employees/update/{id}', 'EmployeesController@update')
    ->name('employees.update');

Route::delete('employees/destroy/{id}', 'EmployeesController@destroy')
    ->name('employees.destroy');

/** CHILDRENS */
Route::get('childrens/index', 'ChildrensController@index')
->name('childrens.create');

Route::post('childrens/store', 'ChildrensController@store')
    ->name('childrens.store');

Route::get('childrens/show/{id}', 'ChildrensController@show')
    ->name('childrens.show');

Route::get('childrens/update/{id}', 'ChildrensController@update')
    ->name('childrens.update');
    
Route::delete('childrens/destroy/{id}', 'ChildrensController@destroy')
    ->name('childrens.destroy');

/** CONTRACTS */
Route::get('contracts/index', 'ContractsController@index')
->name('contracts.create');

Route::post('contracts/store', 'ContractsController@store')
    ->name('contracts.store');

Route::get('contracts/show/{id}', 'ContractsController@show')
    ->name('contracts.show');

Route::get('contracts/update/{id}', 'ContractsController@update')
    ->name('contracts.update');

Route::delete('contracts/destroy/{id}', 'ContractsController@destroy')
    ->name('contracts.destroy');

/** TYPES */
Route::get('types/index', 'TypesController@index')
->name('types.create');

Route::post('types/store', 'TypesController@store')
    ->name('types.store');

Route::get('types/show/{id}', 'TypesController@show')
    ->name('types.show');

Route::get('types/update/{id}', 'TypesController@update')
    ->name('types.update');

Route::delete('types/destroy/{id}', 'TypesController@destroy')
    ->name('types.destroy');

