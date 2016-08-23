@extends('pages.expenses.layout')

@section('expenses_path')
    <li class="active">Expense Transactions</li>
@stop

@section('expenses_title', "Expense Transactions")

@section('expenses_menu')
    <a href="/expenses/transactions/expense/create" class="btn btn-success">Create</a>
@endsection

@section('expenses_content')

    <form action="" method="GET">
        <div class="row">
            <!-- Search -->
            <div class="col-md-6">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                        <button typeof="submit" class="btn btn-primary" type="button">Search</button>
                    </span>
                </div>
            </div>
            <!-- Month -->
            <div class="col-md-4 col-md-offset-2">
                <div class="input-group">
                    <span class="input-group-addon" id="month_label">Month</span>
                    <input type="text" name="at" value="{{ $at->format('F Y') }}" class="form-control month-picker" placeholder="Select Month" aria-describedby="month_label">
                </div>
            </div>

        </div>
    </form>

    <hr/>

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
                format: 'MM yyyy',
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
@append