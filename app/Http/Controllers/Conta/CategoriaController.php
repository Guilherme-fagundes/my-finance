<?php

namespace App\Http\Controllers\Conta;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {
        $userLogged = User::where('id', session()->get('userId'))->first();

        return view('conta.categorias.listar', [
            'title' => env('APP_NAME'). ' | Categorias',
            'user' => $userLogged
        ]);
    }
}
