@extends('pages.expenses.layout')


@section('expenses_path')
    <li><a href="/expenses/category">Categories</a></li>
    <li class="active">{{ $category->name }}</li>
@stop

@section('expenses_title', $category->name)

@section('expenses_content')

    <h5>Type: {{ $category->type_name }}</h5>
    <h5>Budget: {{ $category->budget_formatted }}</h5>

@stop