<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExpenseCheckController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


Route::get('/expense-check', [ExpenseCheckController::class, 'check']);
Route::get('/weekly-expense', [ExpenseController::class, 'weekly']);