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
}
