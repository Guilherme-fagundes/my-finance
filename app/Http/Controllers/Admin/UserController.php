<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

class UserController extends Controller
{
    public function index()
    {



        return view('admin.users.index', [
            'title' => env('APP_NAME'). ' | Usuários'
        ]);

    }
}
