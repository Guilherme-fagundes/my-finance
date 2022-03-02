<?php

use App\Http\Controllers\Conta\ContaController;
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

Route::prefix('app')->group(function (){
    Route::get('/', [ContaController::class, 'home'])->middleware(['checkuserlogin'])->name('conta.home');
    Route::get('/login', [UserLoginController::class, 'login'])->name('user.login');
    Route::get('/esqueci-minha-senha', [UserLoginController::class, 'recoverPass'])->name('user.recoverpass');
    Route::get('/criar-minha-conta', [UserLoginController::class, 'createUserAcount'])->name('user.createNewAcount');
    Route::get('/ativar-conta', [UserLoginController::class, 'confirmUserAcount'])->name('user.confirmAcount');
    Route::post('/criar-minha-conta/post', [UserLoginController::class, 'createUserAcountPost'])->name('user.createNewAcount.post');


});
