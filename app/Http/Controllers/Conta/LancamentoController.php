<?php

namespace App\Http\Controllers\Conta;

use App\Http\Controllers\Controller;
use App\Models\Launch;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * <b>Classe responsavel pelo controlador dos lançamentos</b>
 * @copyright (c) 2022, Guilherme K Fagundes
 */

class LancamentoController extends Controller
{

    /**
     * <p>Realiza o cadastro de lançamentos</p>
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse /
     */

    public function novoLancamentoPost(Request $request)
    {
        if ($request->ajax()){

            if ($request->all()){



                if (in_array('', $request->all())){
                    return Response()->json([
                        'error' => true,
                        'message' => 'Não pode ter campos em branco para fazer um lançamento'
                    ]);
                }else{


                    $lancamento = new Launch();

                    $lancamento->user_id = session()->get('userId');
                    $lancamento->category_id = $request->categoria;
                    $lancamento->wallet_id = $request->wallet_id;
                    $lancamento->descricao = $request->descricao;
                    $lancamento->valor = (double) str_replace(',', '.', str_replace('.', '', $request->valor));
                    $lancamento->data = $request->data;
                    $lancamento->tipo_lancamento = $request->tipo_lancamento;

                    if ($lancamento->save()){
                        return Response()->json([
                            'error' => false,
                            'message' => 'Lançamento efetuado.'
                        ]);
                    }

                }

            }
        }

    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|void
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function delete(Request $request)
    {
        $lancamento = Launch::where('id', '=', $request->launch_id)
            ->where('user_id', '=', session()->get('userId'))->first();

        if (!$lancamento) {
            return Response()->json([
                'error' => true,
                'message' => 'Erro ao tentar excluir este lançamento.'
            ]);
        }else{

            $deletaLancamento = Launch::find($request->launch_id)->delete();
            if($deletaLancamento){
                return Response()->json([
                    'error' => false,
                    'message' => 'Lançamento excluído com sucesso.'
                ]);

            }

        }

    }



    public function editLaunch(int $id, Request $request)
    {
        $userLogged = User::where('id', session()->get('userId'))->first();

        $readLaunch = DB::table('categories')
            ->join('launches', 'categories.id', '=', 'launches.category_id')
            ->where('launches.id', $id)
            ->first();

        $categories = DB::table('categories')->get();

        return view('conta.lancamentos.editar', [
            'title' => env('APP_NAME'). " | Editando lançamento",
            'user' => $userLogged,
            'lancamento' => $readLaunch,
            'categories' => $categories
        ]);
    }

    public function editLaunchPost(Request $request)
    {
        if ($request->ajax()){
            if ($request->all()){

                if (in_array('', $request->all())){
                    return Response()->json([
                        'error' => true,
                        'message' => 'Preencha todos os campos'
                    ]);
                }

                $lancamentoUpdate = $request->except('_token');

                $lancamentoUpdate['tipo_lancamento'] = ($request->tipo_lancamento == 'Receita' ? $lancamentoUpdate['tipo_lancamento'] = 'Receita' : 'Despesa');
                $lancamentoUpdate['valor'] = (double) str_replace(',', '.', str_replace('.', '', $request->valor));

                $lancamentoAtualiza = DB::table('launches')
                    ->where('id', $request->id)
                    ->update($lancamentoUpdate);

                if ($lancamentoAtualiza){
                    return Response()->json([
                        'error' => false,
                        'message' => 'Lançamento atualizado com successo.'
                    ]);
                }


            }

        }

    }
}
