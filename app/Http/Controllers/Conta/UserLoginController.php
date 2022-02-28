<?php

namespace App\Http\Controllers\Conta;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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
        $json['error'] = false;

        if ($request->all()){
            if ($request->ajax()){

                if ($request->input('g-recaptcha-response') == null){
                    $json['message'] = 'Recapcha não verificado';
                    $json['error'] = true;
                }

                if (in_array('', $request->except('_token'))){
                    $json['message'] = 'Parece que tem campos em branco';
                    $json['error'] = true;
                }elseif(!filter_var($request->email, FILTER_VALIDATE_EMAIL)){
                    $json['message'] = 'E-mail não é válido';
                    $json['error'] = true;
                }elseif ($request->email != $request->Cemail){
                    $json['message'] = 'E-mails não conferem';
                    $json['error'] = true;
                }elseif ($request->pass != $request->Cpass){
                    $json['message'] = 'Senhas não conferem';
                    $json['error'] = true;

                }elseif (strlen($request->pass) < 8){
                    $json['message'] = 'Sua senha deve ter no minimo 8 caracteres';
                    $json['error'] = true;
                }else{

                    $emailCheck = DB::table('users')->where('email', $request->email)->first();

                    if ($emailCheck){
                        $json['message'] = 'Uma conta já foi cadastrada com este e-mail';
                        $json['error'] = true;
                    }else{

                        $createUser = new User();
                        $createUser->email = $request->email;
                        $createUser->pass = Hash::make($request->pass);
                        $createUser->status = 0;
                        $createUser->ip = $request->ip();
                        $createUser->user_agent = $request->userAgent();

                        if ($createUser->save()){
                            $json['message'] = "Sua conta foi cadastrada, agora falta pouco. Ative sua conta atraves de seu e-mail cadastrado";
                            $json['error'] = false;


                        }
                    }
                }

            }

        }

        echo json_encode($json);

    }
}
