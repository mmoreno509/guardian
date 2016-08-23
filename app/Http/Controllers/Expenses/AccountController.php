<?php

namespace App\Http\Controllers\Expenses;

use App\Models\Expenses\Account;
use App\Repositories\Expenses\AccountsRepository;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AccountController extends Controller
{
	/** @var AccountsRepository  */
	protected $accountsRepository;
	
	public function __construct(Request $request, AccountsRepository $accountsRepository)
	{
		parent::__construct($request);
		$this->accountsRepository = $accountsRepository;
	}
	
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$accountCollection = $this->accountsRepository->getAccounts($this->user);
        return view('pages.expenses.account.index', compact('accountCollection'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.expenses.account.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\Expenses\CreateAccount $request)
    {
    	
        $account = $this->accountsRepository->createAccount($this->user, $request->all());
		flash()->success("Success!", "Your new {$account->type_name} account {$account->name} is added.");
		return redirect()->to('/expenses/account/');
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
        $this->accountsRepository->deleteAccount($this->user, $id);
		return redirect()->back();
    }
}
