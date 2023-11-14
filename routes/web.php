<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CafeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/home', function () {
    return view('home');
});


Route::get('/cafe',[CafeController::class, 'index']);

Route::post('/cafeform/create',[CafeController::class, 'store']);
Route::get('/cafeform', function () {
    return view('cafeform');
});


Route::get('/updateform/{coffee}', [CafeController::class, 'showUpdateForm']);
Route::put('/updateform/{coffee}', [CafeController::class, 'UpdateTheForm']);
Route::delete('/deleteitem/{coffee}', [CafeController::class, 'DeleteItem']);

Route::get('/description', function () {
    return view('description');
});