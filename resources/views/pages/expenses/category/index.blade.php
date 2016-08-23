@extends('pages.expenses.layout')


@section('expenses_path')
    <li class="active">Categories</li>
@stop

@section('expenses_title', "Categories")

@section('expenses_menu')
    <a href="/expenses/category/create" class="btn btn-success">Create Category</a>
@endsection

@section('expenses_content')

    <table class="table">
        <thead>
        <tr>
            <th>Name</th>
            <th>Type</th>
            <th class="text-right" width="150px">Budget</th>
            <th width="150px"></th>
        </tr>
        </thead>
            @if($incomeCategoryCollection->count() > 0 && $expenseCategoryCollection->count() > 0)
                <tbody>

                    @if($incomeCategoryCollection->count() > 0)
                        <tr class="success">
                            <th colspan="4">Income</th>
                        </tr>
                        @foreach($incomeCategoryCollection as $category)
                            @include('pages.expenses.category.table_row', ['category' => $category])
                        @endforeach
                    @endif

                    @if($expenseCategoryCollection->count() > 0)
                        <tr class="warning">
                            <th colspan="4" class="text-danger">Expenses</th>
                        </tr>
                        @foreach($expenseCategoryCollection as $category)
                            @include('pages.expenses.category.table_row', ['category' => $category])
                        @endforeach
                    @endif

                </tbody>
            @endif
        <tfoot>
            @if($incomeCategoryCollection->count() > 0 && $expenseCategoryCollection->count() > 0)
                <tr class="{{ ($totalBudget > 0) ? 'success' : 'danger' }}">
                    <th colspan="2">Proyection</th>
                    <th class="text-right">{{ '$ ' . money_format('%.2n', $totalBudget) }}</th>
                    <td></td>
                </tr>
            @else
                <tr>
                    <td colspan="4" class="text-center">
                        No categories to show
                    </td>
                </tr>
            @endif
        </tfoot>
    </table>

    <form id="delete_form" action="/expenses/category/[id]" method="POST">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="DELETE">
    </form>

@stop

@section('append_js')
    <script>
        $('.category_delete.btn').click(function(){
            var id = $(this).data('id');
            var action = $('#delete_form').attr('action');
            action = action.replace('[id]', id);
            $('#delete_form').attr('action', action);
            swal({
                title: "Are you sure?",
                text: "You will not lose any transaction associated to this category",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false }, function(){
                    $('#delete_form').submit();
                });
        });
    </script>
@append