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
                <th class="text-right" style="width: 150px">Balance</th>
                <th class="text-right" style="width: 150px">Options</th>
            </tr>
        </thead>
        <tbody>
            @foreach($accountCollection as $account)
            <tr>
                <td><a href="/expenses/account/{{ $account->id }}">{{ $account->name }}</a></td>
                <td>{{ $account->type_name }}</td>
                <td class="text-right">{{ formatToMoney($account->balance) }}</td>
                <td class="text-right">
                    <button type="button" class="btn btn-xs btn-danger delete_btn" data-id="{{ $account->id }}">delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <form id="delete_form" action="/expenses/account/[id]" method="POST">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="DELETE">
    </form>

@stop

@section('append_js')
    <script>
        $('.delete_btn').click(function(){
            var id = $(this).data('id');
            var action = $('#delete_form').attr('action');
            action = action.replace('[id]', id);
            $('#delete_form').attr('action', action);
            swal({
                title: "Are you sure?",
                text: "You may lose any information associated to this account",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false }, function(){
                $('#delete_form').submit();
            });
        });
    </script>
@stop