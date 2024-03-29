<?php

namespace App\Http\Controllers\Conta;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AssinaturaController extends Controller
{
    public function index()
    {
        $userLogged = User::where('id', session()->get('userId'))->first();

        if ($userLogged->nome == null || $userLogged->sobrenome == null) {
            return redirect()->route('conta.perfil')->withErrors(['error' => 'Complete seu perfil']);

        }

        return view('conta.assinatura.index', [
            'title' => ENV('APP_NAME'). ' | Assinatura',
            'user' => $userLogged
        ]);

    }

    public function assinar()
    {
        $updatePlan = DB::table('users')
            ->where('id', session()->get('userId'))
            ->update([
                'tipo_conta' => 'premium'
            ]);
        if ($updatePlan){
            return redirect()->route('conta.home');

        }
    }


    public function cancelar()
    {
        $updatePlan = DB::table('users')
            ->where('id', session()->get('userId'))
            ->update([
                'tipo_conta' => 'free'
            ]);
        if ($updatePlan){
            return redirect()->route('conta.home');

        }
    }
}
