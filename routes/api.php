<?php
use App\Http\Controllers\ProductsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('order', [ProductsController::class, 'create_order']);



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
