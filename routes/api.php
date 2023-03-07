<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\GlobalActionController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UsersController;
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

Route::post('/check_email', [AuthController::class, 'check_email']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);


Route::middleware('auth:sanctum')->group(function () {
    // Global action
    Route::get('search', [GlobalActionController::class, 'search'])->name('search');
    // users
    Route::prefix('/users')->group(function () {
        Route::get('/get-user-profile', [UsersController::class, 'GetUserProfile'])->name('GetUserProfile');
        // Route::get('/get-user-profile', function(){
        //     return 1;
        // })->name('GetUserProfile');
        Route::get('/list-friend', [UsersController::class, 'ListFriend'])->name('ListFriend');
        Route::get('/new-friend', [UsersController::class, 'NewFriend'])->name('NewFriend');
        Route::post('/add-friend', [UsersController::class, 'AddFriend'])->name('AddFriend');
        Route::post('/accept-friend', [UsersController::class, 'AcceptFriend'])->name('AcceptFriend');
        Route::post('/call-offer', [UsersController::class, 'CallOffer'])->name('CallOffer');
        Route::post('/call-answer', [UsersController::class, 'CallAnswer'])->name('CallAnswer');
    });
    Route::prefix('/notification')->group(function () {
        Route::get('/GetTypeNotifi', [NotificationController::class, 'GetTypeNotifi'])->name('GetTypeNotifi');
        Route::post('/add-friend', [NotificationController::class, 'AddFriend'])->name('AddFriend');
        Route::get('/CheckNotifiUnread', [NotificationController::class, 'CheckNotifiUnread'])->name('CheckNotifiUnread');
    });
    Route::prefix('/chat')->group(function () {
        Route::get('/get-chat-detail', [ChatController::class, 'GetChatDetail'])->name('GetChatDetail');
        Route::post('/send-message', [ChatController::class, 'SendMessage'])->name('SendMessage');
    });
    Route::prefix('/post')->group(function () {
        Route::get('/get-type-post', [PostController::class, 'GetTypePost'])->name('GetTypePost');
        Route::post('/update-post', [PostController::class, 'UpdatePost'])->name('UpdatePost');
    });
});
