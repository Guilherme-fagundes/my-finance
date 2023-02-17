<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


class LoginController extends Controller
{


    public function index()
    {



        return view('admin.index', [
            'title' => env('APP_NAME'). ' | Dashboard',

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

    public function newpass()
    {
        return view('admin.new-pass', [
            'title' => env('APP_NAME'). ' | Informe a nova senha'
        ]);
    }

}
