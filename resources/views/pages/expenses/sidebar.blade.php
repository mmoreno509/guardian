<ul class="nav nav-pills nav-stacked">
    @include('pages.expenses.sidebar_link', [ 'link' => '/expenses', 'name' => 'Dashboard' ])
</ul>
<hr/>
<h5 class="text-muted" style="margin-left: 13px">
    Transactions
</h5>
<ul class="nav nav-pills nav-stacked">
    @include('pages.expenses.sidebar_link', [ 'link' => '/expenses/transactions/income', 'name' => 'Incomes' ])
    @include('pages.expenses.sidebar_link', [ 'link' => '/expenses/transactions/expense', 'name' => 'Expenses' ])
    @include('pages.expenses.sidebar_link', [ 'link' => '/expenses/transactions/transfers', 'name' => 'Transfers' ])
</ul>
<hr/>
<h5 class="text-muted" style="margin-left: 13px">
    Settings
</h5>
<ul class="nav nav-pills nav-stacked">
    @include('pages.expenses.sidebar_link', [ 'link' => '/expenses/account', 'name' => 'Accounts' ])
    @include('pages.expenses.sidebar_link', [ 'link' => '/expenses/category', 'name' => 'Categories' ])
</ul>