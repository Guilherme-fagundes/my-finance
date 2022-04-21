<?php

use App\Http\Controllers\Conta\CarteiraController;
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

    Route::any('/perfil', [ContaController::class, 'perfil'])->middleware(['checkuserlogin'])->name('conta.perfil');
    Route::post('/perfil/post', [ContaController::class, 'perfilSalvarDados'])->middleware(['checkuserlogin'])->name('conta.perfil.salvarDados');
    Route::any('/perfil/altera-foto', [ContaController::class, 'perfilAlterarFoto'])->middleware(['checkuserlogin'])->name('conta.perfil.alteraFoto');
    Route::any('/perfil/altera-endereco', [ContaController::class, 'perfilAlterarEndereco'])->middleware(['checkuserlogin'])->name('conta.perfil.alteraEndereco');

    Route::get('/sair', [ContaController::class, 'logount'])->middleware(['checkuserlogin'])->name('conta.logount');
    Route::get('/login', [UserLoginController::class, 'login'])->name('user.login');
    Route::get('/reenviar-email/{email}', [UserLoginController::class, 'reenviarEmail'])->name('user.reenviarEmail');
    Route::any('/login/post', [UserLoginController::class, 'loginPost'])->name('user.login.post');

    Route::get('/esqueci-minha-senha', [UserLoginController::class, 'recoverPass'])->name('user.recoverpass');
    Route::post('/esqueci-minha-senha/post', [UserLoginController::class, 'recoverPassPost'])->name('user.recoverpass.post');
    Route::any('/nova-senha', [UserLoginController::class, 'newPass'])->name('user.newPass');
    Route::post('/nova-senha/post', [UserLoginController::class, 'newPassPost'])->name('user.newPass.post');


    Route::get('/criar-minha-conta', [UserLoginController::class, 'createUserAcount'])->name('user.createNewAcount');
    Route::get('/ativar-conta', [UserLoginController::class, 'confirmUserAcount'])->name('user.confirmAcount');
    Route::post('/criar-minha-conta/post', [UserLoginController::class, 'createUserAcountPost'])->name('user.createNewAcount.post');

    //Rotas Carteiras
    Route::get('/carteiras', [CarteiraController::class, 'listar'])->middleware(['checkuserlogin'])->name('carteiras.listar');
    Route::any('/carteiras/nova/post', [CarteiraController::class, 'novaPost'])->middleware(['checkuserlogin'])->name('carteiras.nova.post');
    Route::any('/carteiras/delete/post', [CarteiraController::class, 'delete'])->middleware(['checkuserlogin'])->name('carteiras.excluir.post');
    Route::any('/carteiras/editar', [CarteiraController::class, 'edit'])->middleware(['checkuserlogin'])->name('carteiras.editar');
    Route::any('/carteiras/editar/post', [CarteiraController::class, 'editPost'])->middleware(['checkuserlogin'])->name('carteiras.editar.post');
    Route::get('/carteira/{id}', [CarteiraController::class, 'openWallet'])->middleware(['checkuserlogin'])->name('carteira.abrir');

});
