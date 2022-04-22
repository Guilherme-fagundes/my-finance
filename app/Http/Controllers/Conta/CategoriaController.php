<?php

namespace App\Http\Controllers\Conta;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriaController extends Controller
{
    public function index()
    {
        $userLogged = User::where('id', session()->get('userId'))->first();

        return view('conta.categorias.listar', [
            'title' => env('APP_NAME'). ' | Categorias',
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
                       'message' => 'Para cadastrar uma categoria não pode ter campos em branco.'
                   ]);

               }

               $createUser = DB::table('categories')
                   ->insert($request->except('_token'));
               if ($createUser){
                   return Response()->json([
                       'error' => false,
                       'message' => 'Categoria cadastrada com sucesso.'
                   ]);

               }

            }

        }

    }
}
