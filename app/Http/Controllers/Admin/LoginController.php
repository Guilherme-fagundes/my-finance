<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.index', [
            'title' => env('APP_NAME'). ' | Dashboard'
        ]);
    }


    public function login()
    {
        return view('admin.login', [
            'title' => env('APP_NAME'). ' | Entrar'
        ]);
    }

    public function passRecover()
    {
        return view('admin.pass-recover', [
            'title' => env('APP_NAME') . ' | Recuperar nenha'
        ]);
    }
}
