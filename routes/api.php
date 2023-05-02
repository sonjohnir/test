<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

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

/*Route::get('/getall', function() {
    return response()->json([
                'names' => [
            'Roman',
            'Denis',
            'John'
        ],
        'ages' => [
            25,
            26,
            34
        ]
        ]);
});
*/
Route::get('/get', [TodoController::class, 'index']);
Route::post('/create', [TodoController::class, 'create']);
Route::post('/update', [TodoController::class, 'update']);
Route::post('/delete', [TodoController::class, 'delete']);
