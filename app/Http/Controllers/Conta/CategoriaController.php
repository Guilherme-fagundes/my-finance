<?php

namespace App\Http\Controllers\Conta;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriaController extends Controller
{
    public function index()
    {
        $userLogged = User::where('id', session()->get('userId'))->first();
        $getCategories = Category::where('user_id', session()->get('userId'))->get();



        return view('conta.categorias.listar', [
            'title' => env('APP_NAME'). ' | Categorias',
            'user' => $userLogged,
            'categories' => $getCategories
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

               $userArr = [
                   'user_id' => session()->get('userId')
               ];

               $dataCategory = array_merge($userArr, $request->except('_token'));

               $createUser = DB::table('categories')
                   ->insert($dataCategory);
               if ($createUser){
                   return Response()->json([
                       'error' => false,
                       'message' => 'Categoria cadastrada com sucesso.'
                   ]);

               }

            }

        }

    }

    public function edit(Request $request)
    {
        if ($request->ajax()){

            if ($request->all()){
                dd($request->all());

            }

        }

    }
}
