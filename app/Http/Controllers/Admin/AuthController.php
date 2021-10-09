<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /* Login Admin User */
    public function login()
    {
        $data = (object)[];
        return view('admin.login', [ 'data' => $data ]);
    }
}
