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

    public function weekly()
    {
        $start = Carbon::now()->subDays(7);
        $end = Carbon::now();

        $expenses = Expense::whereBetween('created_at', [$start, $end])->get();

        $total = $expenses->sum('amount');

        $categories = $expenses->groupBy('category')->map(function ($items) {
            return $items->sum('amount');
        });

        return response()->json([
            'from' => $start->toDateString(),
            'to' => $end->toDateString(),
            'total' => $total,
            'categories' => $categories
        ]);
    }

    public function monthlyReport()
    {
        $start = Carbon::now()->subMonth()->startOfMonth();
        $end = Carbon::now()->subMonth()->endOfMonth();

        $expenses = Expense::whereBetween('created_at', [$start, $end])->get();

        $total = $expenses->sum('amount');

        $categories = $expenses->groupBy('category')->map(function ($items) {
            return $items->sum('amount');
        });

        return response()->json([
            'month' => $start->format('F Y'),
            'total' => $total,
            'categories' => $categories
        ]);
    }

}
