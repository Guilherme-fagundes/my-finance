<?php

namespace App\Http\Controllers\Conta;

use App\Models\Category;
use App\Models\Launch;
use App\Models\User;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Bus\DatabaseBatchRepository;
use Illuminate\Support\Facades\Validator;
use Illuminate\Testing\Fluent\Concerns\Has;


/**
 * <p>Esta classe é o controlador responsavel pela conta de usuário</p>
 *
 * @copyright (c) 2022, Guilherme K Fagundes
 */
class ContaController extends Controller
{

    /**
     * <p>Metodo responsavel por exibir a tela home do sistema</p>
     */
    public function home()
    {

        $userLogged = DB::table('users')->where('id', session()->get('userId'))->first();
        if ($userLogged->nome == null || $userLogged->sobrenome == null) {
            return redirect()->route('conta.perfil')->withErrors(['error' => 'Complete seu perfil']);

        }

        $categories = Category::where('user_id', session()->get('userId'))->get();
        $lancamentos = Launch::where('user_id', session()->get('userId'))->get();
        $totalReceitas = Launch::where('user_id', session()->get('userId'))
            ->where('tipo_lancamento', 'receita')->sum('valor');
        $totalDespesas = Launch::where('user_id', session()->get('userId'))
            ->where('tipo_lancamento', 'Despesa')->sum('valor');


        $ultimosLancamentos = DB::table('wallets')
            ->join('launches', 'wallets.id', '=', 'launches.wallet_id')
            ->join('categories', 'launches.category_id', '=', 'categories.id')
            ->where('launches.user_id', session()->get('userId'))
            ->limit(5)
            ->orderByDesc('launches.id')
            ->get(['*','categories.nome as category_name', 'wallets.nome as wallet_name']);

        return view('conta.home', [
            'title' => 'Conta | Home',
            "user" => $userLogged,
            'categories' => $categories,
            'lancamentos' => $lancamentos,
            'saldoGeral' => $totalReceitas - $totalDespesas,
            'ultimosLancamenrtos' => $ultimosLancamentos
        ]);
    }

    /**
     * <p>Metodo responsavel por exibir tela de perfil do usuário</p>
     * @return array
     */
    public function perfil()
    {
        $userLogged = DB::table('users')->where('id', session()->get('userId'))->first();
        $addressUser = DB::table('addresses')->where('user_id', $userLogged->id)->first();

        return view('conta.perfil.perfil', [
            'title' => "My Finance | Meu perfil",
            'user' => $userLogged,
            'addressUser' => $addressUser
        ]);

    }

    /**

     *
     * @param Request $request
     * @return json Retorna as resposta das validações
     */
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

    /**

     * <p>Metodo responsavel por realizar a validação e alteração de foto de
     * perfil do usuário<p>
     * @param Request $request
     * @return json Retorna as respostas de validação
     */
    public function perfilAlterarFoto(Request $request)
    {
        $json = [];

        if ($request->ajax()){
            $validation = Validator::make($request->all(), [
                'foto' => 'required|mimes:jpeg,jpg,png'
            ]);

           if ($request->file('foto')->isValid()){



               if ($validation->fails()){
                   return Response()->json([
                       'error' => true,
                       'errors' => $validation->errors()
                   ]);
               }else{

                   $user = User::where('id', '=', session()->get('userId'))->first();

                   $image = $request->file('foto');
                   if (empty($user->foto)){
                       $fileName = $user->id.'-'.$user->nome .'.'. $image->getClientOriginalExtension();

                   }else{
                       $fileName = $user->id.'-'.$user->nome .'.'. $image->getClientOriginalExtension();
//
                   }



                   $uploaded = $image->storeAs('conta/usuario/'. session()->get('userId'), $fileName);
                   if ($uploaded){

                       DB::table('users')
                           ->where('id', '=', session()->get('userId'))
                           ->update([
                               'foto' => $fileName
                           ]);
                       return Response()->json([
                           'error' => false,
                           'message' => 'Foto atualizada com sucesso'
                       ]);
                   }

               }
           }


        }
    }

    /**

     * <p>Metodo responsável por validar e alterar endereço do usuário</p>
     * @param Request $request
     * @return json Retorna as respostas das validações
     */
    public function perfilAlterarEndereco(Request $request)
    {
        if ($request->ajax()){

            if ($request->all()){
                if (in_array('', $request->all())){
                    return Response()->json([
                        'error' => true,
                        'message' => 'Não pode ter campos em branco'
                    ]);

                }else{

                    $checkExistAddress = DB::table('addresses')
                        ->where('user_id', '=', session()->get('userId'))->first();
                    if ($checkExistAddress){

                        $addressUpdate = DB::table('addresses')
                            ->where('user_id', session()->get('userId'))
                            ->update($request->except('_token', 'user_id'));


                        if ($addressUpdate){
                            return Response()->json([
                                'error' => false,
                                'message' => "Endereço atualizado"
                            ]);
                        }else{
                            return Response()->json([
                                'error' => true,
                                'message' => "Erro ao atualizar"
                            ]);
                        }

                    }

                }
            }

        }

    }

    public function perfilAlterarSenha(Request $request)
    {
        if ($request->ajax()){
            if ($request->all()){
               if (in_array('', $request->all())){
                   return Response()->json([
                       'error' => true,
                       'message' => 'para alterar a senha não pode ter campos em branco.'
                   ]);

               }elseif ($request->pass != $request->Cpass){

                   return Response()->json([
                       'error' => true,
                       'message' => 'As senhas não conferem.'
                   ]);
               }else{

                   $pass = Hash::make($request->pass);

                   $alterPass = DB::table('users')
                       ->where('id', session()->get('userId'))
                       ->update(['pass' => $pass]);
                   if ($alterPass){
                       return Response()->json([
                           'error' => false,
                           'message' => 'Senha atualizada com sucesso.'
                       ]);

                   }
               }

            }
        }
    }

    /**

     * <p>Metodo responsavel por realizar o logout do sistema<p>
     * @param Request $request
     *
     */
    public function logount(Request $request)
    {
        if ($request->session()->has('userId')) {
            $request->session()->forget('userId');
            $request->session()->flush();

            return redirect()->route('conta.home');
        }

    }
}
