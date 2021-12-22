<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validator = $this->validateRequest($request, 'login');
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Request with semantic errors',
                'error' => $validator->messages()
            ], 422);
        } 
        if (Auth::attempt($request->only('email', 'password'))) {
            $user = User::where('email', '=', $request['email'])->first();
            $token = $user->createToken($user->name)->plainTextToken; 
    
            return response()->json([
                'access_token' => $token,
                'token_type' => 'Bearer',
                'message' => 'Success'
            ], 201);
        } else {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }
    }

    public function register(Request $request)
    {
        $validator = $this->validateRequest($request, 'register');
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Request with semantic errors',
                'error' => $validator->messages()
            ], 422);
        } 
        if (!User::where('email', '=', $request['email'])->exists()) {
            $user = User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password'])
            ]);
    
            $token = $user->createToken($user->name)->plainTextToken;
    
            return response()->json([
                'access_token' => $token,
                'token_type' => 'Bearer',
                'message' => 'Success'
            ], 201);
        } else {
            return response()->json([
                'message' => 'Already exists'
            ], 422);
        }
    }

    public function validateRequest(Request $request, $method){
        if($method == 'register'){
            return Validator::make($request->all(), [
                'name' => 'required|string',
                'email' => 'required|email|unique:users',
                'password' => 'required|string|min:8'
            ]);
        }
        if($method == 'login'){
            return Validator::make($request->all(), [
                'email' => 'required|email',
                'password' => 'required|string|min:8'
            ]);
        }
    }   
}


