<?php

namespace App\Http\Controllers\Conta;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Http\Request;

class CarteiraController extends Controller
{
    public function listar()
    {
        $userLogged = User::where('id', session()->get('userId'))->first();
        $wallet = $userLogged->wallet()->get();


        return view('conta.carteiras.listar', [
            'title' => env("APP_NAME"). " | Todas as carteiras",
            'user' => $userLogged,
            'wallets' => $wallet
        ]);
    }

    public function novaPost(Request $request)
    {
        if ($request->ajax()){
            if ($request->all()){

                if (in_array('', $request->all())){
                    return Response()->json([
                        'error' => true,
                        'message' => 'Para criar uma carteira não pode ter campos em branco.'
                    ]);
                }

                $checkWalletExist = Wallet::where('nome', $request->descricao)->first();

                if ($checkWalletExist){

                    return Response()->json([
                        'error' => true,
                        'message' => 'esta carteira já existe'
                    ]);
                }

                $wallet = new Wallet();

                $wallet->user_id = session()->get('userId');
                $wallet->nome = $request->descricao;
                $wallet->cor = $request->cor_carteira;

                $wallet->save();

                return Response()->json([
                    'result' => view('conta.carteiras.components.walletsList', [
                        'wallet' => $wallet
                    ])->render()
                ]);
            }
        }

    }

    public function delete(Request $request)
    {
        if ($request->ajax()){

            $delWallet = Wallet::where('id', '=', $request->get('carteira_id'))->first();

            if ($delWallet){
                $delWallet->delete();

                return Response()->json([
                    'error' => false,
                    'message' => "Carteira deletada"
                ]);
            }
        }


    }

    public function edit(Request $request)
    {
        if ($request->ajax()){

            $readWallet = Wallet::where('id', '=', $request->carteira_id)->first();
            if ($readWallet){
                return Response()->json([
                    'error' => false,
                    'result' => $readWallet
                ]);

            }

        }
    }

    public function editPost(Request $request)
    {
        if ($request->ajax()){

            if (in_array('', $request->all())){
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

            if ($editWallet){


                return Response()->json([
                    'error' => false,
                    'message' => 'Carteira atualizada'
                ]);
            }

        }
    }
}
