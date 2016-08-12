@extends('pages.expenses.layout')


@section('expenses_path')
    <li><a href="/expenses/account">Accounts</a></li>
    <li class="active">New Account</li>
@stop

@section('expenses_title', "New Account")

@section('expenses_menu')
    <a href="/expenses/transaction/create" class="btn btn-success">Create Transaction</a>
@endsection

@section('expenses_content')

    <form method="POST" action="/expenses/account">

        @if(count($errors))
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @include('pages.expenses.account.create_form')

    </form>

@stop