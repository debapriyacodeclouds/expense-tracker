@extends('layout')

@section('content')

<div class="card">
    <div class="card-body">

        <h3 class="mb-4">Edit Expense</h3>

        <form action="{{ route('expenses.update', $expense->id) }}"
              method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Title</label>

                <input type="text"
                       name="title"
                       value="{{ $expense->title }}"
                       class="form-control">
            </div>

            <div class="mb-3">
                <label>Amount</label>

                <input type="number"
                       step="0.01"
                       name="amount"
                       value="{{ $expense->amount }}"
                       class="form-control">
            </div>

            <div class="mb-3">
                <label>Category</label>

                <input type="text"
                       name="category"
                       value="{{ $expense->category }}"
                       class="form-control">
            </div>

            <div class="mb-3">
                <label>Date</label>

                <input type="date"
                       name="expense_date"
                       value="{{ $expense->expense_date }}"
                       class="form-control">
            </div>

            <div class="mb-3">
                <label>Notes</label>

                <textarea name="notes"
                          class="form-control">{{ $expense->notes }}</textarea>
            </div>

            <button class="btn btn-primary">
                Update Expense
            </button>

        </form>

    </div>
</div>

@endsection