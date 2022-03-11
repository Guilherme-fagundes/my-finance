<?php

namespace App\Http\Controllers\Conta;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContaController extends Controller
{
    public function home()
    {
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
