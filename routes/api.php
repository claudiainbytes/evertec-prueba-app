<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\AuthController as AuthControllerV1;
use App\Http\Controllers\Api\V1\LeadController as LeadControllerV1;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => 'auth:sanctum'], function() {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::get('/test', function () {
        return "OK";
    });
    Route::apiResource('v1/leads/', LeadControllerV1::class)->only(['store']);
    Route::get('v1/leads/check/{hash?}', [LeadControllerV1::class, 'checkLead']);
    Route::patch('v1/leads/statusgetresource/{hash?}', [LeadControllerV1::class, 'updateStatusGetResource']);
});

Route::get('/greeting', function () {
    return 'Hello World';
});

Route::post('v1/register', [AuthControllerV1::class, 'register']);
Route::post('v1/login', [AuthControllerV1::class, 'login']);