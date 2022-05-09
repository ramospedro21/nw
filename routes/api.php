<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\ProductionsController;
use App\Http\Controllers\Api\VotesController;

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

Route::post('/votes/{production_id}', [VotesController::class, 'store']);
Route::get('/showProductions', [ProductionsController::class, 'index']);

Route::middleware(['auth:sanctum'])->group(function () {

    Route::resource('/productions', ProductionsController::class);

});

require __DIR__.'/auth.php';
