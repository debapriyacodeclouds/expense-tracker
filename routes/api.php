<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExpenseCheckController;

Route::get('/expense-check', [ExpenseCheckController::class, 'check']);