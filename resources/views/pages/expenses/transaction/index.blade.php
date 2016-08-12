@extends('pages.expenses.layout')

@section('expenses_path')
    <li class="active">Incomes</li>
@stop

@section('expenses_title', "Transactions")

@section('expenses_menu')
    <a href="/expenses/transaction/create" class="btn btn-success">Create Transaction</a>
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
                <td></td>
                <td>{{ $transaction->amount_formatted }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

@stop