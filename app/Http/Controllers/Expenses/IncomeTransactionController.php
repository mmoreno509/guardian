<?php

namespace App\Http\Controllers\Expenses;

use App\Http\Requests\Expenses\IncomeTransactionStore;
use App\Models\Expenses\Account;
use App\Models\Expenses\Category;
use App\Models\Expenses\Transaction;
use App\Models\Expenses\TransactionTypesEnum;
use App\Repositories\Expenses\TransactionsRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IncomeTransactionController extends Controller
{
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$at = new Carbon($this->request->get('at'));
    	$transactionCollection = Transaction::with('category')
			->byType(TransactionTypesEnum::INCOME)
			->byMonth($at)
			->get();
        return view('pages.expenses.transaction.income.index', compact('transactionCollection'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$categoryList = Category::byType(TransactionTypesEnum::INCOME)
			->orderBy('name')
			->get()
			->lists('name', 'id');
		$accountList = Account::orderBy('name')
			->get()
			->lists('name', 'id');
		$category = new Category();
    	
        return view('pages.expenses.transaction.income.create', compact('categoryList', 'accountList', 'category'));
    }
	
	/**
	 * Store a newly created resource in storage.
	 *
	 * @param IncomeTransactionStore|Request $request
	 * @param TransactionsRepository $transactionsRepository
	 * @return \Illuminate\Http\Response
	 */
    public function store(IncomeTransactionStore $request, TransactionsRepository $transactionsRepository)
    {
        $transactionsRepository->createIncome(
        	$this->user,
			new Carbon($request->get('at')),
			Category::find($request->get('category_id')),
			Account::find($request->get('account_id')),
			$request->get('description'),
			$request->get('amount'));
		
		return redirect()->refresh();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
