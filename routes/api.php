<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });



//APIController routes
Route::controller(App\Http\Controllers\APIController::class)->group(function () 
{
    //user registration
    Route::post('/user-register', 'register');

    //user login
    Route::post('/user-login', 'login');

    //get logged users activity - with sanctum - Bearer token needed
    Route::get('/logged-users-activity', 'loggedUsersActivity')->middleware(['auth:sanctum', 'super_admin']);
});