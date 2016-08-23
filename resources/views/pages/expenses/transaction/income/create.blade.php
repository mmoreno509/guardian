@extends('pages.expenses.layout')

@section('expenses_path')
    <li><a href="/expenses/transactions/income">Income Transactions</a></li>
    <li class="active">New Income</li>
@stop

@section('expenses_title', "Register Income")

@section('expenses_content')

    <form method="POST" action="/expenses/transactions/income">

        @if(count($errors))
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @include('pages.expenses.transaction.income.create_form', ['categoryList' => $categoryList, 'accountList' => $accountList])

    </form>

@stop