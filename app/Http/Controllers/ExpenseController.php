<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $expenses = Expense::latest()->get();

        $totalExpense = Expense::sum('amount');

        $todayExpense = Expense::whereDate(
            'expense_date',
            today()
        )->sum('amount');

        $monthlyExpense = Expense::whereMonth(
            'expense_date',
            now()->month
        )->sum('amount');

        return view('expenses.index', compact(
            'expenses',
            'totalExpense',
            'todayExpense',
            'monthlyExpense'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('expenses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'amount' => 'required|numeric',
            'category' => 'required',
            'expense_date' => 'required|date',
        ]);

        Expense::create($request->all());

        return redirect('/')
            ->with('success', 'Expense Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Expense $expense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Expense $expense)
    {
        return view('expenses.edit', compact('expense'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Expense $expense)
    {
        $request->validate([
            'title' => 'required',
            'amount' => 'required|numeric',
            'category' => 'required',
            'expense_date' => 'required|date',
        ]);

        $expense->update($request->all());

        return redirect('/')
            ->with('success', 'Expense Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Expense $expense)
    {
        $expense->delete();

        return redirect('/')
            ->with('success', 'Expense Deleted Successfully');
    }
}
