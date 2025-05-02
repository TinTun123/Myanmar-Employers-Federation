<?php

use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\SecureDownloadController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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

Route::get('/secure-download/folder/{responseId}', [SecureDownloadController::class, 'downloadFolder'])
    ->middleware('signed')->name('secure.download.folder');


Route::get('/{any}', function () {
    return view('index');
})->where('any', '.*');
