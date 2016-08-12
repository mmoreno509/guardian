<?php

namespace App\Http\Controllers\Expenses;

use App\Models\Expenses\Account;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AccountController extends Controller
{
	
	/**
	 * @var Request
	 */
	protected $request;
	
	public function __construct(Request $request)
	{
		$this->request = $request;
	}
	
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$accountCollection = Account::byUserId($this->request->user()->id)->paginate(10);
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
        $account = Account::create(['user_id' => $this->request->user()->id] + $request->all());
		flash()->success("Success!", "Your new account is added.");
		return redirect()->to('/expenses/account/' . $account->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $account = Account::find($id);
		return view('pages.expenses.account.show', compact('account'));
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
