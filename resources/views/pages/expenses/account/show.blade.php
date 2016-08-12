@extends('pages.expenses.layout')


@section('expenses_path')
    <li><a href="/expenses/account">Accounts</a></li>
    <li class="active">{{ $account->name }}</li>
@stop

@section('expenses_title', $account->name)

@section('expenses_content')

    <h3>{{ $account->name }}</h3>
    <h5>{{ $account->type_name }}</h5>

@stop