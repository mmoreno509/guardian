@extends('layout')

@section('path')
    @hasSection('expenses_path')
        <li><a href="/expenses">Expenses</a></li>
        @yield('expenses_path')
    @else
        <li class="active">Expenses</li>
    @endif
@append

@section('content')
    <div class="row">
        <div class="col-sm-9" style="padding-right: 40px">
            @hasSection ('expenses_title')
                <div class="row">
                    <div class="col-sm-6">
                        <h3>@yield('expenses_title')</h3>
                    </div>
                    <div class="col-sm-6 text-right">
                        <div class="clearfix" style="height: 22px"></div>
                        @yield('expenses_menu')
                    </div>
                </div>
                <hr/>
            @endif
            @yield('expenses_content')
        </div>
        <div class="col-sm-3" style="border-left: 1px solid #EEEEEE;">
            @include('pages.expenses.sidebar')
        </div>
    </div>
@stop