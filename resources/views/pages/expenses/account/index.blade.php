@extends('pages.expenses.layout')


@section('expenses_path')
    <li class="active">Accounts</li>
@stop

@section('expenses_title', "Accounts")

@section('expenses_menu')
    <a href="/expenses/account/create" class="btn btn-success">Create Account</a>
@endsection

@section('expenses_content')

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Account</th>
                <th>Type</th>
                <th>Balance</th>
            </tr>
        </thead>
        <tbody>
            @foreach($accountCollection as $account)
            <tr>
                <td><a href="/expenses/account/{{ $account->id }}">{{ $account->name }}</a></td>
                <td>{{ $account->type_name }}</td>
                <td></td>
            </tr>
            @endforeach
        </tbody>
    </table>

@stop