<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DtableController;
use App\Http\Controllers\CrudajaxController;
use App\Http\Controllers\CrudUploadController;
use App\Http\Controllers\CrudStandarController;
use App\Http\Controllers\RestClient1Controller;
use App\Http\Controllers\CrudMultipleController;
use App\Http\Controllers\DynamicselectController;
use App\Http\Controllers\CrudSweetAlertController;




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
    return view('login.index', [
        'title' => 'Laravel Jutsu | Login Page'
    ]);
})->name('login');

Route::post('/login_proses', [LoginController::class, 'authenticate'])->name('login_proses')->middleware('guest');

Route::get('/dashboard', function(){
    return view('dashboard.index', [
        'title' => 'Laravel Jutsu | Dashboard'
    ]);
})->middleware('auth');

Route::get('/logout', [LoginController::class, 'logout']);

// Rest Client 1............................................................................
Route::resource('/rest_client1', RestClient1Controller::class)->middleware('auth');

// Yajra DataTable
Route::get('/yajra_data_table', [DtableController::class, 'index'])->middleware('auth');

// CRUD Ajax
Route::get('/crud_ajax', [CrudajaxController::class, 'index'])->middleware('auth');
Route::post('/crud_ajax_add', [CrudajaxController::class, 'addProduct'])->name('crud_ajax.add');
Route::get('/crud_ajax/{id}', [CrudajaxController::class, 'getProductById']);
Route::put('/student', [CrudajaxController::class, 'updateProduct'])->name('crud_ajax.update');
Route::delete('/student/{id}', [CrudajaxController::class, 'deleteProduct']);

// Dynamic Select Livewire
Route::get('/dynamic_select', [DynamicselectController::class, 'index']);
Route::post('/dynamic_select', [DynamicselectController::class, 'showCity'])->name('dynamic.showcity');

// CRUD Standar (Halaman Customnya) -> jika ada function custom di controller resource, pastikan route nya di taruh di atas routing resource nya
Route::get('/crud_standar/custom', [CrudStandarController::class, 'custom'])->middleware('auth');

// CRUD Standar (Resource)
Route::resource('/crud_standar', CrudStandarController::class)->middleware('auth');

// CRUD Upload (Resource)
Route::resource('/crud_upload', CrudUploadController::class)->middleware('auth');

// CRUD SweetAlert (Resource)
Route::resource('/crud_sweetalert', CrudSweetAlertController::class)->middleware('auth');

// CRUD Multiple
Route::resource('/crud_multiple', CrudMultipleController::class)->middleware('auth');