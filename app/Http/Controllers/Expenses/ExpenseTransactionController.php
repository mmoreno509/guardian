<?php

namespace App\Http\Controllers\Expenses;

use App\Http\Requests\Expenses\ExpenseTransactionStore;
use App\Models\Expenses\Account;
use App\Models\Expenses\Category;
use App\Models\Expenses\Transaction;
use App\Models\Expenses\TransactionTypesEnum;
use App\Repositories\Expenses\TransactionsRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ExpenseTransactionController extends Controller
{
	protected $transactionsRepository;
	
	public function __construct(Request $request, TransactionsRepository $transactionsRepository)
	{
		parent::__construct($request);
		$this->transactionsRepository = $transactionsRepository;
	}
	
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$at = new Carbon($this->request->get('at'));
		$transactionCollection = $this->transactionsRepository->getTransactions($this->user, TransactionTypesEnum::EXPENSE, $at, $this->request->get('search'));
		return view('pages.expenses.transaction.expense.index', compact('transactionCollection', 'at'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$categoryList = Category::byType(TransactionTypesEnum::EXPENSE)
			->orderBy('name')
			->get()
			->lists('name', 'id');
		$accountList = Account::orderBy('name')
			->get()
			->lists('name', 'id');
	
		return view('pages.expenses.transaction.expense.create', compact('categoryList', 'accountList'));
    }
	
	/**
	 * Store a newly created resource in storage.
	 *
	 * @param ExpenseTransactionStore|Request $request
	 * @param TransactionsRepository $transactionsRepository
	 * @return \Illuminate\Http\Response
	 */
    public function store(ExpenseTransactionStore $request, TransactionsRepository $transactionsRepository)
    {
		$transactionsRepository->createExpense(
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
        $this->transactionsRepository->deleteTransaction($this->user, $id);
		return redirect()->back();
    }
}
