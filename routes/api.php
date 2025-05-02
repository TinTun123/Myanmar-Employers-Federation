<?php

use App\Http\Controllers\AnswerController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\StatementController;
use Illuminate\Http\Request;
use Illuminate\Routing\Middleware\ThrottleRequests;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// Statement routes
Route::get('/statements', [StatementController::class, 'index'])->name('statements.index');
Route::get('/statements/{statement}', [StatementController::class, 'show'])->name('statements.show');

Route::post('/login', [AuthController::class, 'login']);

// Comment routes
Route::get('{type}/{id}/comments', [CommentController::class, 'index']);
Route::post('{type}/{id}/comments', [CommentController::class, 'store']);

// news routes
Route::get('/news', [NewsController::class, 'index']); // List all news
Route::get('/news/{news}', [NewsController::class, 'show']); // Show a single news item
Route::post('/news/{news}/like', [NewsController::class, 'like']); // Like a news item

// Form routes
Route::get('/forms/{form}', [FormController::class, 'show'])->name('forms.show');
Route::post('/forms/{form}/answers', [AnswerController::class, 'store'])->name('answer.store');

// Chunked file upload routes
Route::post('/upload-chunk', [FileUploadController::class, 'uploadChunk'])
    ->middleware('throttle:upload')
    ->withoutMiddleware('throttle:api');

Route::post('/merge-chunks', [FileUploadController::class, 'mergeChunks'])
    ->middleware('throttle:upload')
    ->withoutMiddleware('throttle:api');

// Protected routes for creating, updating, and deleting news
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user', [AuthController::class, 'user']);
    Route::get('/users', [AuthController::class, 'users']);
    Route::put('/users/{user}', [AuthController::class, 'updateUser']);
    Route::delete('/users/{user}', [AuthController::class, 'deleteUser']);

    // Protected routes for news
    Route::post('/news', [NewsController::class, 'store']); // Create news
    Route::put('/news/{news}', [NewsController::class, 'update']); // Update news
    Route::delete('/news/{news}', [NewsController::class, 'destroy']); // Delete news

    // Protected routes for statements
    Route::post('/statements', [StatementController::class, 'store'])->name('statements.store');
    Route::put('/statements/{statement}', [StatementController::class, 'update'])->name('statements.update');
    Route::delete('/statements/{statement}', [StatementController::class, 'destroy'])->name('statements.destroy');

    // Protected routes for Form
    Route::post('/forms', [FormController::class, 'store'])->name('forms.store');
    Route::get('/forms', [FormController::class, 'index'])->name('forms.index');
    Route::delete('/forms/{form}', [FormController::class, 'destroy']);
    Route::put('/forms/{form}', [FormController::class, 'update'])->name('forms.update');

    // Protected routes for responses
    Route::get('/forms/{form}/responses', [AnswerController::class, 'showResponses'])->name('responses.index');
    Route::get('/responses/{response_id}/answers', [AnswerController::class, 'getAnswers'])->name('responses.answers');
    Route::delete('/form-versions/{form_version}', [AnswerController::class, 'deleteVersion'])->name('form_version.delete');
    Route::get('/forms/{form_version}/responses/download', [AnswerController::class, 'downloadSheet'])->name('responses.download');

    // Protected routes for file download
    Route::get('/download-file', function (Illuminate\Http\Request $request) {
        // Ensure the user is authenticated
        if (!auth()->check()) {
            abort(403, 'Unauthorized access');
        }

        // Validate the file path
        $request->validate([
            'path' => 'required|string',
        ]);

        // Extract the relative file path from the URL
        $filePath = str_replace(url('/storage'), 'public', $request->query('path'));

        // Check if the file exists
        if (!Storage::exists($filePath)) {
            abort(404, 'File not found');
        }

        // Serve the file as a download
        return Storage::download($filePath);
    })->name('download-file');
});
