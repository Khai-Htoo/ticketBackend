<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\TicketController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResources(['ticket' => TicketController::class]);
Route::patch('changeStatus', [TicketController::class, 'ChangeStatus']);
Route::get('filterTicket/{date}', [TicketController::class, 'filterTicket']);
Route::get('sortTicket/{sort}', [TicketController::class, 'sortTicket']);
Route::apiResources(['category' => CategoryController::class]);
Route::apiResources(['comment' => CommentController::class]);
