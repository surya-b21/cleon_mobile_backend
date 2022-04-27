<?php

use App\Http\Controllers\API\EmailVerificationController;
use App\Http\Controllers\API\NewPasswordController;
use App\Http\Controllers\API\UserController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register']);

Route::get('/login/{provider}', [UserController::class, 'redirectToProvider']);
Route::get('/login/{provider}/callback', [UserController::class, 'handleProviderCallback']);

Route::post('forgot-password', [NewPasswordController::class, 'forgotPassword']);
// Route::post('reset-password', [NewPasswordController::class, 'reset']);

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::post('email/verification-notification', [EmailVerificationController::class, 'sendVerificationEmail']);
    Route::get('verify-email/{id}/{hash}', [EmailVerificationController::class, 'verify'])->name('verification.verify');


    Route::post('details', [UserController::class, 'details']);
    Route::post('logout', [UserController::class, 'logout']);
});
