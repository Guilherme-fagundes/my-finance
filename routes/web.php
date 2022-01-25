<?php

use App\Http\Controllers\Conta\UserLoginController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::prefix('conta')->group(function (){
    Route::get('/login', [UserLoginController::class, 'login'])->name('user.login');
    Route::get('/esqueci-minha-senha', [UserLoginController::class, 'recoverPass'])->name('user.recoverpass');
    Route::get('/criar-minha-conta', [UserLoginController::class, 'createUserAcount'])->name('user.createNewAcount');
});
