<?php

<<<<<<< HEAD
=======
use App\Models\ButtonLogs;
>>>>>>> d4881665874791e20a2d1ae4d1fceb37b8d2e233
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ButtonController;
use APP\Http\Middleware\VerifyAdminAccess;
<<<<<<< HEAD
// use App\Http\Middleware\VerifyAdminAccess;
use App\Http\Controllers\ArduinoController;
=======
use App\Http\Controllers\ArduinoController;
// use App\Http\Middleware\VerifyAdminAccess;
>>>>>>> d4881665874791e20a2d1ae4d1fceb37b8d2e233
use App\Http\Controllers\ButtonLogController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PresureController;
use App\Http\Controllers\TruckRegistrationController;
<<<<<<< HEAD
use App\Models\ButtonLogs;
=======
>>>>>>> d4881665874791e20a2d1ae4d1fceb37b8d2e233

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
<<<<<<< HEAD
    return redirect('dashboard');
=======
    return redirect('/login');
>>>>>>> d4881665874791e20a2d1ae4d1fceb37b8d2e233
});



Auth::routes();


// Route::get('/register', function () {
//     return redirect(route('login'));
// });

Route::controller(DashboardController::class)->group(function (){
    Route::get('/dashboard', 'dashboard')->name('dashboard');
});




Route::get('/user-list',            [UserController::class, 'userList'])->name('user.list');
Route::get('/user-form/{id?}',      [UserController::class, 'userForm'])->name('user.form');
Route::post('/user-delete/',        [UserController::class, 'userDelete'])->name('user.delete');
Route::post('/user-save/',          [UserController::class, 'userSave'])->name('user.save');


Route::get('/arduino-list',         [ArduinoController::class, 'index'] )->name('arduino.list');
Route::get('/arduino-form/{id?}',   [ArduinoController::class, 'viewArduino'] )->name('arduino.form');
Route::post('/arduino-save',        [ArduinoController::class, 'saveArduino'] )->name('arduino.save');
Route::post('/arduino-delete',      [ArduinoController::class, 'deleteArduino'] )->name('arduino.delete');


Route::get('/button-list',          [ButtonController::class, 'buttonStatus'] )->name('button.list');
Route::get('/button-form/{id?}',    [ButtonController::class, 'buttonStatusForm'] )->name('button.form');
Route::post('/button-save',         [ButtonController::class, 'buttonStatusSave'] )->name('buttonAction.save');


// Route::get('/button-log/{name}', [ButtonLogController::class, 'showButtonLog'])->name('showButton.log');
Route::get('/button-log/{name}',    [ButtonLogController::class, 'showButtonLog'])->name('showButton.log');
Route::get('/presure-log/{name}',   [PresureController::class, 'showPresureLog'])->name('showPresure.log');

Route::get('/button-log/{arduino_name}', [ButtonLogController::class, 'buttonLog'])->name('button.log');
