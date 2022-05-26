<?php

namespace App\Http\Controllers\Conta;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


/**

 * <p><b>Esta classe é o controlador responsavel pelas categorias</b></p>
 * @copyright (c) 2022, Guilherme K Fagundes
 */
class CategoriaController extends Controller
{
    /**

     * <p>Metodo responsável por exibir a pagina index das categorias</p>
     * @return array
     */
    public function index()
    {
        $userLogged = User::where('id', session()->get('userId'))->first();
        $getCategories = Category::where('user_id', session()->get('userId'))->paginate(5);

        if ($userLogged->nome == null || $userLogged->sobrenome == null) {
            return redirect()->route('conta.perfil')->withErrors(['error' => 'Complete seu perfil']);

        }

        return view('conta.categorias.listar', [
            'title' => env('APP_NAME'). ' | Categorias',
            'user' => $userLogged,
            'categories' => $getCategories
        ]);
    }

    /**

     * <p>metodo responsável por validar e cadastrar novas categorias
     * no sistema</p>
     * @param Request $request
     * @return json Retorna as responstas das validações
     */
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

               /**
                * Une os ARRAYs em apanas 1 para realizar o cadastro
                */
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

    /**

     * <p>Metodo responsável por fazer a leitura da categoria na modal de exibição</p>
     * @param Request $request
     * @return json
     */
    public function edit(Request $request)
    {
        if ($request->ajax()){

            if ($request->all()){

                $readCategory = Category::where('id', '=', $request->edit_category_id)->first();

                return Response()->json([
                    'error' => false,
                    'result' => $readCategory
                ]);

            }

        }

    }

    /**

     * <p>Metodo responsável por realizar a alteração e validação da categoria </p>
     * @param Request $request
     * @return json
     */
    public function editPost(Request $request)
    {
        if ($request->ajax()){

            if ($request->all()){

                if (in_array('', $request->all())){
                    return Response()->json([
                        'error' => true,
                        'message' => 'Para atualizar a categoria não pode ter campos em branco.'
                    ]);
                }else{

                    $catUpdate = DB::table('categories')
                        ->where('id', '=', $request->id)
                        ->update($request->except(['_token', 'id']));

                    if ($catUpdate){
                        return Response()->json([
                            'error' => false,
                            'message' => 'Categoria atualizada com sucesso.'
                        ]);

                    }
                }
            }

        }
    }

    /**

     * <p>Metodo responsável por deletar uma categoria do sistema</p>
     * @param Request $request
     * @return json
     */
    public function delete(Request $request)
    {
        if ($request->ajax()){

            $delCat = Category::where('id', '=', $request->delete_category_id)->first();
            if ($delCat){
                $delCat->delete();

                return Response()->json([
                    'error' => false,
                    'message' => 'Categoria deletada.'
                ]);
            }

        }
    }
}
