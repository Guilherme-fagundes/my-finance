<?php

namespace App\Http\Controllers\Conta;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Bus\DatabaseBatchRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContaController extends Controller
{

    public function home()
    {

        $userLogged = DB::table('users')->where('id', session()->get('userId'))->first();
        if ($userLogged->nome == null || $userLogged->sobrenome == null){
            return redirect()->route('conta.perfil')->withErrors(['error' => 'Complete seu perfil']);

        }

        return view('conta.home', [
            'title' => 'Conta | Home',
            "user" => $userLogged
        ]);
    }

    public function perfil()
    {
        $userLogged = DB::table('users')->where('id', session()->get('userId'))->first();

        return view('conta.perfil.perfil', [
            'title' => "My Finance | Meu perfil",
            'user' => $userLogged
        ]);

    }

    public function perfilSalvarDados(Request $request)
    {
        $json['error'] = false;

        if ($request->all()){
            if ($request->ajax()){
                if (in_array('', $request->except('_token'))){
                    $json['error'] = true;
                    $json['message'] = "Parece que tem campos em branco";
                }elseif (!filter_var($request->email, FILTER_VALIDATE_EMAIL)){
                    $json['error'] = true;
                    $json['message'] = "E-mail informado é inválido";
                }else{

                    $userUpdate = DB::table('users')
                        ->where('id', '=', session()->get('userId'))
                        ->update($request->except('_token'));
                    if ($userUpdate){
                        $json['error'] = false;
                        $json['message'] = "Dados atualizados";
                    }
                }

            }
        }

        echo json_encode($json);
    }

    public function logount(Request $request)
    {
        if ($request->session()->has('userId')){
            $request->session()->forget('userId');
            $request->session()->flush();

            return redirect()->route('conta.home');
        }

    }
}
