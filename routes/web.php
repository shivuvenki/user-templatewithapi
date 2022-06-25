<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
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

Route::get('/', [LoginController::class,'login'])->middleware('UserNotLogin');

Route::get('login', [LoginController::class,'login'])->middleware('UserNotLogin');
Route::get('logout', [LoginController::class,'logout']);
Route::post('login-with-userid-password-ajax', [LoginController::class,'login_with_userid_password_ajax']);
Route::get('/', [LoginController::class,'login']);
//Auth Start
Route::group(['middleware' => ['UserSuccessLogin']], function () {
    Route::get('/userPanel', [LoginController::class,'userPanel']);	

    Route::get('/createTemplate', [LoginController::class,'createTemplate']);
    Route::post('create-template-ajax', [LoginController::class,'create_template_ajax']);
    
    Route::get('/view-template', [LoginController::class,'view_template']);
    Route::get('/email-template', [LoginController::class,'email_template']);

    Route::post('get-template-em-ajax', [LoginController::class,'get_template_em_ajax']);
    Route::post('send-email-template-ajax', [LoginController::class,'send_email_template_ajax']);


});
