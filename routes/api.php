<?php

use App\Http\Controllers\ProductController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::post('/tokens/create', function (Request $request) {
    $user=User::first();
    $token = $user->createToken('sdd');

    return ['token' => $token->plainTextToken];
});


Route::middleware('auth:sanctum')->post('buy-product', [ProductController::class,'buyProduct']);


