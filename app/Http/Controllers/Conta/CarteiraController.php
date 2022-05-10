<?php

namespace App\Http\Controllers\Conta;

use App\Helpers\CarteirasHelper;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Launch;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 *
 */
class CarteiraController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function listar()
    {
        $userLogged = User::where('id', session()->get('userId'))->first();
        $wallets = $userLogged->wallet()->get();



        return view('conta.carteiras.listar', [
            'title' => env("APP_NAME") . " | Todas as carteiras",
            'user' => $userLogged,
            'wallets' => $wallets
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|void
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function novaPost(Request $request)
    {
        if ($request->ajax()) {
            if ($request->all()) {

                if (in_array('', $request->all())) {
                    return Response()->json([
                        'error' => true,
                        'message' => 'Para criar uma carteira não pode ter campos em branco.'
                    ]);
                }


                if ($request->ajax()) {
                    if ($request->all()) {

                        if (in_array('', $request->all())) {
                            return Response()->json([
                                'error' => true,
                                'message' => 'Para criar uma carteira não pode ter campos em branco.'
                            ]);
                        }

                        $saldo = [];
                        $despesas = [];
                        $saldoTotalCarteira = null;

                        $wallet = new Wallet();

                        $wallet->user_id = session()->get('userId');
                        $wallet->nome = $request->descricao;
                        $wallet->cor = $request->cor_carteira;

                        $wallet->save();

                        return Response()->json([
                            'result' => view('conta.carteiras.components.walletsList', [
                                'wallet' => $wallet,
                                'saldo' => $saldo,
                                'despesas' => $despesas,
                                'saldoTotalCarteira' => $saldoTotalCarteira
                            ])->render()
                        ]);
                    }
                }

            }
        }

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|void
     */
    public function delete(Request $request)
    {
        if ($request->ajax()) {

            $checkExist = DB::table('launches')
                ->where('user_id', session()->get('userId'))
                ->where('wallet_id', $request->carteira_id)->exists();
            if ($checkExist){
                return Response()->json([
                    'error' => true,
                    'message' => 'Esta carteira não pode ser excluída, pois existem lançamentos nesta carteira.'
                ]);
            }

            $delWallet = Wallet::where('id', '=', $request->get('carteira_id'))->first();

            if ($delWallet) {
                $delWallet->delete();

                return Response()->json([
                    'error' => false,
                    'message' => "Carteira deletada"
                ]);
            }
        }


    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|void
     */
    public function edit(Request $request)
    {
        if ($request->ajax()) {

            $readWallet = Wallet::where('id', '=', $request->carteira_id)->first();
            if ($readWallet) {
                return Response()->json([
                    'error' => false,
                    'result' => $readWallet
                ]);

            }

        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|void
     */
    public function editPost(Request $request)
    {
        if ($request->ajax()) {

            if (in_array('', $request->all())) {
                return Response()->json([
                    'error' => true,
                    'message' => 'Para atualizar uma carteira não pode ter campos em branco'
                ]);

            }
            $editWallet = Wallet::where('id', $request->id)
                ->update([
                    'nome' => $request->descricao,
                    'cor' => $request->cor_carteira
                ]);

            if ($editWallet) {


                return Response()->json([
                    'error' => false,
                    'message' => 'Carteira atualizada'
                ]);
            }

        }
    }

    /**
     * @param int $id
     */
    public function openWallet(int $id)
    {
        $userLogged = User::where('id', session()->get('userId'))->first();
        $wallet = Wallet::where('id', '=', $id)->first();

        $readDespesas = DB::table('categories')
            ->where('user_id', session()->get('userId'))
            ->where('tipo', '=', 1)->get();

        $readReceitas = DB::table('categories')
            ->where('user_id', session()->get('userId'))
            ->where('tipo', '=', 2)->get();

        $categoriasLancamento = DB::table('categories')
            ->join('launches', 'categories.id', '=', 'launches.category_id')
            ->where('launches.user_id', session()->get('userId'))
            ->where('launches.wallet_id', $id)
            ->paginate(5);

//        dd($categoriasLancamento);

        $readCategories = Category::all()->all();


        return view('conta.carteiras.abrir', [
            'title' => env('APP_NAME') . ' | Carteira ' . $wallet->nome,
            'user' => $userLogged,
            'wallet' => $wallet,
            'despesas' => $readDespesas,
            'receitas' => $readReceitas,
            'lancamentos' => $categoriasLancamento,
            'categories' => $readCategories
        ]);
    }

}
