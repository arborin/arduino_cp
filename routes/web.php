<?php

use App\Http\Controllers\ArduinoController;
use App\Http\Controllers\ButtonController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TruckRegistrationController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
// use App\Http\Middleware\VerifyAdminAccess;
use APP\Http\Middleware\VerifyAdminAccess;
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
    return redirect('/login');
});



Auth::routes();


// Route::get('/register', function () {
//     return redirect(route('login'));
// });

Route::controller(DashboardController::class)->group(function (){
    Route::get('/dashboard', 'dashboard')->name('dashboard');
});



// Route::controller(TruckRegistrationController::class)->group(function () {
//     // Route::get('/orders/{id}', 'show');
//     // Route::post('/orders', 'store');

//     Route::get('/registration-list', 'registrationList')->name('registration.list');
//     Route::post('/registration-list', 'registrationList')->name('registration.list');
//     Route::get('/registration-form/{id?}', 'registrationFrom')->name('registration.form');
//     Route::post('/save-registration', 'saveRegistration')->name('registration.save');
//     Route::post('/delete-registration', 'deleteRegistration')->name('registration.delete');
//     Route::post('/export-registration/', 'exportRegistration')->name('registration.export');
// });


Route::get('/user-list', [UserController::class, 'userList'])->name('user.list');
Route::get('/user-form/{id?}', [UserController::class, 'userForm'])->name('user.form');
Route::post('/user-delete/', [UserController::class, 'userDelete'])->name('user.delete');
Route::post('/user-save/', [UserController::class, 'userSave'])->name('user.save');

// Route::get('/registration-list', function(){
//     return "HELLO";
// })->name('registration.list');

Route::get('/arduino-list', [ArduinoController::class, 'index'] )->name('arduino.list');
Route::get('/arduino-form/{id?}', [ArduinoController::class, 'viewArduino'] )->name('arduino.form');
Route::post('/arduino-save', [ArduinoController::class, 'saveArduino'] )->name('arduino.save');
Route::post('/arduino-delete', [ArduinoController::class, 'deleteArduino'] )->name('arduino.delete');


Route::get('/button-list', [ButtonController::class, 'buttonStatus'] )->name('button.list');
Route::get('/button-form/{id?}', [ButtonController::class, 'buttonStatusForm'] )->name('button.form');
Route::post('/button-save', [ButtonController::class, 'buttonStatusSave'] )->name('buttonAction.save');


