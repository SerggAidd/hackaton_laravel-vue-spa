<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\OAuthController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Settings\PasswordController;
use App\Http\Controllers\Settings\ProfileController;
use App\Http\Controllers\ScoreController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\Auth\UserController; 
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

Route::group(['middleware' => 'auth:api'], function () {
    Route::post('logout', [LoginController::class, 'logout']);

    Route::get('user', [UserController::class, 'current']);

    Route::patch('settings/profile', [ProfileController::class, 'update']);
    Route::patch('settings/password', [PasswordController::class, 'update']);

    Route::get('score/get',[ScoreController::class, 'get']);
    Route::post('score/create',[ScoreController::class, 'create']);
    Route::post('score/edit',[ScoreController::class, 'edit']);
    Route::post('score/delete',[ScoreController::class, 'delete']);

    Route::get('group/get',[GroupController::class, 'get']);
    Route::post('group/create',[GroupController::class, 'create']);
    Route::post('group/edit',[GroupController::class, 'edit']);
    Route::post('group/delete',[GroupController::class, 'delete']);

    Route::get('user/get',[UserController::class, 'get']);
    Route::post('user/create',[UserController::class, 'create']);
    Route::post('user/edit',[UserController::class, 'edit']);
    Route::post('user/delete',[UserController::class, 'delete']);
});

Route::group(['middleware' => 'guest:api'], function () {
    Route::post('login', [LoginController::class, 'login']);
    Route::post('register', [RegisterController::class, 'register']);

    Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail']);
    Route::post('password/reset', [ResetPasswordController::class, 'reset']);

    Route::post('email/verify/{user}', [VerificationController::class, 'verify'])->name('verification.verify');
    Route::post('email/resend', [VerificationController::class, 'resend']);

    Route::post('oauth/{driver}', [OAuthController::class, 'redirect']);
    Route::get('oauth/{driver}/callback', [OAuthController::class, 'handleCallback'])->name('oauth.callback');



});
