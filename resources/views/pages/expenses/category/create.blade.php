@extends('pages.expenses.layout')


@section('expenses_path')
    <li><a href="/expenses/category">Categories</a></li>
    <li class="active">{{ empty($category) ? "New Category" : $category->name }}</li>
@append

@section('expenses_title', empty($category) ? "New Category" : "Edit Category: " . $category->name)

@section('expenses_content')

    <form method="POST" action="/expenses/category/{{ empty($category) ?: $category->id }}">

        @if(count($errors))
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @include('pages.expenses.category.create_form')

    </form>

@stop