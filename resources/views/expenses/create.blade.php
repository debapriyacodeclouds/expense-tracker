@extends('layout')

@section('content')

<div class="card">
    <div class="card-body">

        <h3 class="mb-4">Add Expense</h3>

        <form action="{{ route('expenses.store') }}"
              method="POST">

            @csrf

            <div class="mb-3">
                <label>Title</label>

                <input type="text"
                       name="title"
                       class="form-control">
            </div>

            <div class="mb-3">
                <label>Amount</label>

                <input type="number"
                       step="0.01"
                       name="amount"
                       class="form-control">
            </div>

            <div class="mb-3">
                <label>Category</label>

                <select name="category"
                        class="form-control">

                    <option>Food</option>
                    <option>Travel</option>
                    <option>Shopping</option>
                    <option>Bills</option>

                </select>
            </div>

            <div class="mb-3">
                <label>Date</label>

                <input type="date"
                       name="expense_date"
                       class="form-control">
            </div>

            <div class="mb-3">
                <label>Notes</label>

                <textarea name="notes"
                          class="form-control"></textarea>
            </div>

            <button class="btn btn-success">
                Save Expense
            </button>

        </form>

    </div>
</div>

@endsection