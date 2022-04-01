<?php

namespace App\Http\Controllers\Conta;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CarteiraController extends Controller
{
    public function listar()
    {
        $userLogged = DB::table('users')->where('id', session()->get('userId'))->first();

        return view('conta.carteiras.listar', [
            'title' => env("APP_NAME"). " | Todas as carteiras",
            'user' => $userLogged
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

                return Response()->json([
                    'error' => false,
                    'message' => 'Carteira cadastrada'
                ]);
            }
        }

    }
}
