<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Employee;
use App\Http\Controllers\usersController;
use App\Models\Emp;
use App\Http\Controllers\Website;
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

Route::get('/',[usersController::class, 'index']);
Route::get ('/about', [usersController::class, 'about']);

Route::get ('/mail', [Website::class, 'sendmail']);
	
Route::resource ('emp', Employee::class);
Route::get ('trash', [Employee::class,'trash'] )->name('trash');
Route::get ('emp/restor/{id}', [Employee::class, 'restor'])->name('restor');
Route::get ('emp/force-delete/{id}', [Employee::class, 'forceDelete'])->name('force-delete');