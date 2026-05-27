@extends('layout')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Expense Tracker</h2>

    <a href="{{ route('expenses.create') }}"
       class="btn btn-primary">
        Add Expense
    </a>
</div>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="row mb-4">

    <div class="col-md-4">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <h6>Total Expense</h6>
                <h3>₹{{ $totalExpense }}</h3>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <h6>Today's Expense</h6>
                <h3>₹{{ $todayExpense }}</h3>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <h6>Monthly Expense</h6>
                <h3>₹{{ $monthlyExpense }}</h3>
            </div>
        </div>
    </div>

</div>

<table class="table table-hover table-bordered bg-white shadow-sm">
    <thead>
        <tr>
            <th>Title</th>
            <th>Amount</th>
            <th>Category</th>
            <th>Date</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>
        @forelse($expenses as $expense)
        <tr>
            <td>{{ $expense->title }}</td>
            <td>₹{{ $expense->amount }}</td>
            <td>{{ $expense->category }}</td>
            <td>{{ $expense->expense_date }}</td>

            <td class="d-flex gap-2">

                    <a href="{{ route('expenses.edit', $expense->id) }}"
                    class="btn btn-warning btn-sm">
                        Edit
                    </a>

                    <!-- Delete Button -->
                    <form action="{{ route('expenses.destroy', $expense->id) }}"
                        method="POST"
                        class="delete-form">

                            @csrf
                            @method('DELETE')

                            <button type="button"
                                    class="btn btn-danger btn-sm delete-btn">

                                Delete

                            </button>

                </form>

            </td>
        </tr>
        @empty

        <tr>
            <td colspan="5" class="text-center">
                No expenses found.
            </td>
        </tr>

   
    @endforelse
    </tbody>
</table>


<script>

document.querySelectorAll('.delete-btn').forEach(button => {

    button.addEventListener('click', function () {

        const form = this.closest('.delete-form');

        Swal.fire({
            title: 'Are you sure?',
            text: "This expense will be deleted!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {

            if (result.isConfirmed) {
                form.submit();
            }

        });

    });

});

</script>


    
@endsection