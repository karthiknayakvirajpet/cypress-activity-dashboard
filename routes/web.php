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

//redirect routes
Route::redirect('/', '/login');
Route::redirect('/login', '/login');

//LoginController routes
Route::controller(App\Http\Controllers\Auth\LoginController::class)->group(function () 
{
    //login form
    Route::get('/login', 'loginForm')->name('login');

    //login
    Route::post('/login', 'login')->name('custom.login');

    //logout
    Route::any('/logout', 'logout')->name('logout');
});


//Super Admin Routes
Route::middleware(['auth', 'super_admin'])->group(function () 
{
    Route::prefix('admin')->group(function () 
    {   
        //AdminController routes
        Route::controller(App\Http\Controllers\AdminController::class)->group(function () 
        {
            //dashboard
            Route::get('dashboard', 'dashboard')->name('admin.dashboard');

            //add activity
            Route::get('add-activity', 'createActivity')->name('admin.activity.add');

            //store activity
            Route::post('store-activity', 'storeActivity')->name('admin.activity.store');

            //edit activity
            Route::get('edit-activity/{id}', 'editActivity')->name('admin.activity.edit');

            //update activity
            Route::post('update-activity', 'updateActivity')->name('admin.activity.update');

            //delete activity
            Route::get('delete-activity/{id}', 'deleteActivity')->name('admin.activity.delete');

            //check count of activities for selected date
            Route::get('check-activity-count/{date}', 'checkActivityCount')->name('admin.activity.count');
        });

        //UserActivityController routes
        Route::resource('user-activities', '\App\Http\Controllers\UserActivityController');
        Route::controller(App\Http\Controllers\UserActivityController::class)->group(function () 
        {
            //add user activity
            Route::get('add-user-activity/{id}', 'create')->name('user.activity.add');

            //update user activity
            Route::post('user-activity-update/{id}', 'update')->name('user.activity.update');

            //delete user activity
            Route::get('delete-user-activity/{id}', 'destroy');

            //check count of user activities for selected date
            Route::get('check-user-activity-count/{user_id}/{date}', 'checkUserActivityCount')->name('user.activity.count');
        });

    });
});