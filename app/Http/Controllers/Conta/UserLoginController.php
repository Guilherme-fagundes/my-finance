<?php

namespace App\Http\Controllers\Conta;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserLoginController extends Controller
{
    public function login()
    {
        return view('conta.login', [
            'title' => 'My Finance | Entrar'
        ]);
    }
}
