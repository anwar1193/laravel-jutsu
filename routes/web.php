<?php

use App\Mail\TestMail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\DtableController;
use App\Http\Controllers\CrudajaxController;
use App\Http\Controllers\CrudUploadController;
use App\Http\Controllers\CrudStandarController;
use App\Http\Controllers\RestClient1Controller;
use App\Http\Controllers\CrudMultipleController;
use App\Http\Controllers\DynamicselectController;
use App\Http\Controllers\CrudSweetAlertController;
use App\Http\Controllers\WebcamController;
use App\Http\Controllers\ExportPdfController;
use App\Http\Controllers\DTableServerSideController;
use App\Http\Controllers\FluentStringController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\AutoRefreshController;
use App\Http\Controllers\AlternativeJoinController;


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
})->middleware('auth')->name('dashboard.index');

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

// Webcam
Route::get('/webcam', [WebcamController::class, 'index']);
Route::post('/webcam', [WebcamController::class, 'store'])->name('webcam.capture');

// Export PDF
Route::get('/export_pdf', [ExportPdfController::class, 'index']);
Route::get('/export_pdf_proses', [ExportPdfController::class, 'cetak_pdf'])->name('export_pdf.proses');

// Data Table Server Side
Route::get('/dtable_serverside', [DTableServerSideController::class, 'index'])->name('dtable_serverside.index');
Route::get('/dtable_serverside/detail', [DTableServerSideController::class, 'detail'])->name('dtable_serverside.detail');

// Fluent String
Route::get('/fluent_string', [FluentStringController::class, 'index']);

// Localization (Multi Bahasa)
Route::get('/localization/{locale}', [LocalizationController::class, 'index']);
Route::post('/localization-change', [LocalizationController::class, 'change'])->name('localization.change');

// Email
Route::get('/email', [EmailController::class, 'index']);
// Route::get('/email-send', function(){
//     Mail::to('munawarahmad758@gmail.com')->send(new TestMail());
// });
Route::post('/email-send', [EmailController::class, 'send'])->name('email.send');

Route::get('/auto-refresh', [AutoRefreshController::class, 'index'])->name('autorefresh.index');
Route::get('/auto-refresh/get_data', [AutoRefreshController::class, 'data']);

// Alternative Join
Route::get('/alternative-join', [AlternativeJoinController::class, 'index'])->name('alternativejoin.index');