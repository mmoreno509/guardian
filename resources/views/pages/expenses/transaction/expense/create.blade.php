@extends('pages.expenses.layout')

@section('expenses_path')
    <li><a href="/expenses/transactions/expense">Expense Transactions</a></li>
    <li class="active">New Expense</li>
@stop

@section('expenses_title', "Register Expense")

@section('expenses_content')

    <form method="POST" action="/expenses/transactions/expense">

        @if(count($errors))
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @include('pages.expenses.transaction.expense.create_form', ['categoryList' => $categoryList, 'accountList' => $accountList])

    </form>

@stop