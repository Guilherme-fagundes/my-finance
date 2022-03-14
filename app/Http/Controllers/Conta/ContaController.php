<?php

namespace App\Http\Controllers\Conta;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ContaController extends Controller
{
    public function home()
    {

//        dd(User::find(session()->get('userId'))->address()->first());

        return view('conta.home', [
            'title' => 'Conta | Home'
        ]);
    }

    public function logount(Request $request)
    {
        if ($request->session()->has('userId')){
            $request->session()->forget('userId');
            $request->session()->flush();

            return redirect()->route('conta.home');
        }

    }
}
