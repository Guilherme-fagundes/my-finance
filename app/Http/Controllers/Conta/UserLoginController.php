<?php

namespace App\Http\Controllers\Conta;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserLoginController extends Controller
{
    public function login()
    {

        return view('conta.login', [
            'title' => 'My Finance | Entrar'
        ]);
    }

    public function recoverPass()
    {
        return view('conta.esqueci-senha', [
            'title' => 'My Finance | Esqueci minha senha'
        ]);
    }

    public function createUserAcount()
    {
        return view('conta.nova-conta', [
            'title' => 'My Finance | Criar minha conta'
        ]);
    }

    public function createUserAcountPost(Request $request)
    {
        if ($request->all()){
            var_dump($request->all());

            $validator = Validator::make(\request()->all(), [
                'g-recaptcha-response' => 'recaptcha',
            ]);

            if ($validator->fails()){
                $errors = $validator->errors();

                var_dump($errors);

            }

        }

    }
}
