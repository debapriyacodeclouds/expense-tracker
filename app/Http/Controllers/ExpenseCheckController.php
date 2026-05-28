<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;
use Carbon\Carbon;

class ExpenseCheckController extends Controller
{
    
    public function check()
    {
        $today = Carbon::now('Asia/Kolkata')->toDateString();
        $exists = Expense::whereDate('created_at', today())->exists();

        return response()->json([
            'hasExpense' => $exists
        ]);
    }
}
