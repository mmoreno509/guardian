@extends('pages.expenses.layout')

@section('expenses_path')
    <li class="active">Expense Transactions</li>
@stop

@section('expenses_title', "Expense Transactions")

@section('expenses_menu')
    <form action="" method="GET" class="form-inline">
        <input type="text" name="at" value="{{ $at->format('') }}" placeholder="Select Month" class="form-control month-picker">
        <a href="/expenses/transactions/expense/create" class="btn btn-success">Create</a>
    </form>
@endsection

@section('expenses_content')

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Date</th>
                <th>Category</th>
                <th>Description</th>
                <th>Account</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
        @foreach($transactionCollection as $transaction)
            <tr>
                <td>{{ $transaction->at->format('M j') }}</td>
                <td>{{ ($transaction->category) ? $transaction->category->name : '' }}</td>
                <td>{{ $transaction->description }}</td>
                <td>
                    @if($transaction->getFirstAccount())
                        {{ $transaction->getFirstAccount()->name }}
                    @else
                        <span class="text-muted">none</span>
                    @endif
                </td>
                <td>{{ $transaction->amount_formatted }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

@stop

@section('append_js')
    <script>
        $(function(){
            $('.month-picker').datepicker({
                minViewMode: 1,
                maxViewMode: 2,
                autoclose: true,
                todayHighlight: true
            });

            $('.month-picker').change(function(){
                $(this).closest('form').submit();
            });
        });
    </script>
@stop