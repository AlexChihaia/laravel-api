<?php

use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\TechnologyController;
use App\Http\Controllers\Api\TypeController;
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

/* Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); */


//esempio bad practice
/* Route::get('test', function () {
    return response()->json([
        'nome' => 'franco',
        'pisello' => 'corto',
    ]);
}); */

Route::get('projects', [ProjectController::class, 'index']);
Route::get('technologies', [TechnologyController::class, 'index']);
Route::get('types', [TypeController::class, 'index']);
