<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ErrorController;
use App\Http\Controllers\SysController;
use App\Http\Controllers\QueueSysController;




Route::get('/', [UsersController::class, 'loginuser']);
Route::get('loginusers', [UsersController::class, 'loginuser']);
Route::get('checkloginusers', [UsersController::class, 'checkuser']);
Route::get('permissiondenide', [UsersController::class, 'notpermission']);
Route::get('sessionexpire', [UsersController::class, 'sessionhasexpire']);
Route::get('error404', [ErrorController::class, 'pagenotfound']);
Route::get('logout', [UsersController::class, 'logoutuser']);

Route::get('setup1', [SysController::class, 'view']);
Route::get('change_queue', [SysController::class, 'change_queue']);
Route::get('add_context', [SysController::class, 'add_context']);
Route::post('delete_context', [SysController::class, 'delete_context']);

Route::get('setup2', [QueueSysController::class, 'view']);
Route::get('add_context_queue', [QueueSysController::class, 'add_context_queue']);
Route::post('delete_context_queue', [QueueSysController::class, 'delete_context_queue']);
Route::get('change_music', [QueueSysController::class, 'change_music']);

Route::get('apply_config', [QueueSysController::class, 'apply_config']);

