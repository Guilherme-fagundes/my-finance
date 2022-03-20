<?php

namespace App\Http\Controllers\Conta;

use App\Models\User;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Bus\DatabaseBatchRepository;

class ContaController extends Controller
{

    public function home()
    {

        $userLogged = DB::table('users')->where('id', session()->get('userId'))->first();
        if ($userLogged->nome == null || $userLogged->sobrenome == null) {
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

        if ($request->all()) {
            if ($request->ajax()) {

                //Atualização de dados
                if (in_array('', $request->except('_token'))) {
                    $json['error'] = true;
                    $json['message'] = "Parece que tem campos em branco";
                } elseif (!filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
                    $json['error'] = true;
                    $json['message'] = "E-mail informado é inválido";
                } else {

                    $userUpdate = DB::table('users')
                        ->where('id', '=', session()->get('userId'))
                        ->update($request->except('_token'));
                    if ($userUpdate) {
                        $json['error'] = false;
                        $json['message'] = "Dados atualizados";
                    }
                }

            }
        }

        echo json_encode($json);
    }

    public function perfilAlterarFoto(Request $request)
    {
        $json = [];
        if ($request->ajax()) {

            if (in_array('', $request->all())) {
                return Response()->json([
                    'error' => true,
                    'message' => "Selecione uma imagem"
                ]);
            }elseif ($request->file('foto')->getClientOriginalExtension() != "png"){
                return Response()->json([
                    'error' => true,
                    'message' => "Tipo de arquivo inválido"
                ]);
            }else {

                $uploadedUserPicture = $request->file('foto')
                    ->store('conta/usuario/' . $request->session()->get('userId'));

                if ($uploadedUserPicture){
                    return Response()->json([
                        'error' => false,
                        'message' => "Imagem atualizada com sucesso"
                    ]);
                }
            }

        }

//        echo json_encode($json);
    }

    public function logount(Request $request)
    {
        if ($request->session()->has('userId')) {
            $request->session()->forget('userId');
            $request->session()->flush();

            return redirect()->route('conta.home');
        }

    }
}
