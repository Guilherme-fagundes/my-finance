<?php

namespace App\Http\Controllers\Conta;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AssinaturaController extends Controller
{
    public function index()
    {
        $userLogged = User::where('id', session()->get('userId'))->first();

        return view('conta.assinatura.index', [
            'title' => ENV('APP_NAME'). ' | Assinatura',
            'user' => $userLogged
        ]);

    }
}
