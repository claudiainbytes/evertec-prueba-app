<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Config;
use App\Models\Administrator;
use Auth;
use Route;

class AuthController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest:administrator', ['except' => ['logout']]);
    }

    /* Login Admin User */
    public function login()
    {
        $data = (object)[];
        return view('admin.auth.login', [ 'data' => $data ]);
    }

    /* Valida login de usuario administrador */
    public function validateSession(Request $request)
    {
        $data = (object)[];
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('administrator')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('/admin/dashboard');
        }
        return back()->withInput($request->only('email')); 
    }

    
    /* Cierra sesion de un usuario tipo Usuario */
    public function logout()
    {
        Auth::guard('administrator')->logout();
        return redirect('/');
    }
}
