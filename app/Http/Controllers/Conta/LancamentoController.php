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
                    $lancamento->tipo_lancamento = 'Receita';

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


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|void
     */
    public function editLaunch(Request $request)
    {
        if ($request->ajax()){
            if ($request->all()){
                $readLaunch = DB::table('categories')
                    ->join('launches', 'categories.id', '=', 'launches.category_id')
                    ->first();

                if (!$readLaunch){
                    return Response()->json([
                        'error' => true,
                        'message' => 'Não é possível exibir dados.'
                    ]);

                }


                $readLaunch->valor = number_format($readLaunch->valor, 2, ',', '.');
                $readLaunch->data = date('Y-m-d H:i:s', strtotime($readLaunch->data));

                return Response()->json([
                    'error' => false,
                    'result' => $readLaunch,
                ]);
            }

        }
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
