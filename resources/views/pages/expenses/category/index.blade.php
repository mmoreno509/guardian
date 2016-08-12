@extends('pages.expenses.layout')


@section('expenses_path')
    <li class="active">Categories</li>
@stop

@section('expenses_title', "Categories")

@section('expenses_menu')
    <a href="/expenses/category/create" class="btn btn-success">Create Category</a>
@endsection

@section('expenses_content')

    <table class="table table-striped">
        <thead>
        <tr>
            <th>Name</th>
            <th>Type</th>
            <th class="text-right" width="150px">Budget</th>
            <th width="100px"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($categoryCollection as $category)
            <tr>
                <td><a href="/expenses/category/{{ $category->id }}">{{ $category->name }}</a></td>
                <td>{{ $category->type_name }}</td>
                <td class="text-right">{{ $category->budget_formatted }}</td>
                <td class="text-right">
                    <a href="/expenses/category/{{ $category->id }}" class="btn btn-xs btn-info">View</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@stop