<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;

class ExpenseCheckController extends Controller
{
    
    public function check()
    {
        $exists = Expense::whereDate('created_at', today())->exists();

        return response()->json([
            'hasExpense' => $exists
        ]);
    }
}
