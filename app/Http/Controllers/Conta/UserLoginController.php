<?php

namespace App\Http\Controllers\Conta;

use App\Http\Controllers\Controller;
use App\Mail\CreateUserAcount;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class UserLoginController extends Controller
{
    public function login()
    {

        if (session()->has('userId') == true){
            return redirect()->route('conta.home');
        }

        return view('conta.login', [
            'title' => 'My Finance | Entrar'
        ]);
    }

    public function loginPost(Request $request)
    {
        $json['error'] = false;

        if ($request->all()){
            if ($request->ajax()){

                if (in_array('', $request->all())){
                    $json['error'] = true;
                    $json['message'] = "Para fazer login você precisa preencher todos os campos";
                }elseif (!filter_var($request->email, FILTER_VALIDATE_EMAIL)){

                    $json['error'] = true;
                    $json['message'] = "O formato de email está inválido";
                }else{

                    $email = DB::table('users')
                        ->where('email', '=', $request->email)->first();


                    $pass = Hash::check($request->pass, $email->pass);

                    if (!$email || !$pass){
                        $json['error'] = true;
                        $json['message'] = "E-mail ou senha invalidos";
                    }elseif ($email->status == 0){
                        $json['error'] = true;
                        $json['message'] = "Sua conta não esta ativada";
                    }else{
                        $json['error'] = false;
                        $json['message'] = "Seja bem vindo {$email->nome}";

                        $request->session()->put('userId', $email->id);


                    }

                }


            }
        }

        echo json_encode($json);

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

                            Mail::send(new CreateUserAcount($createUser));


                        }
                    }
                }

            }

        }

        echo json_encode($json);

    }

    public function confirmUserAcount (Request $request)
    {
        if (!$request->get('email')){
            return redirect()->route('user.login');
        }

        $activateUserAcount = DB::table('users')
            ->update(['status' => 1]);
        if ($activateUserAcount){
            return redirect()->route('user.login')->withErrors(['success' => 'Sua conta foi ativada! Tudo certo para controlar suas finanças']);
        }
    }
}
