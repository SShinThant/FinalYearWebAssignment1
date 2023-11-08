<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CafeController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/coffees',[CafeController::class,'get_coffees']);
Route::post('/coffees',[CafeController::class,'create_coffees']);
Route::put('/coffees/{id}/update',[CafeController::class,'update_coffees']);
Route::delete('/coffees/{id}/delete',[CafeController::class,'delete_coffees']);

Route::get('/test_coffees', function() {
    return response()->json([
    'message'=>'Cafe'
    ]);
});
    
