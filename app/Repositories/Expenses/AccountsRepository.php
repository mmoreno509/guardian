<?php
namespace App\Repositories\Expenses;

use App\Models\Expenses\Account;
use App\Models\User;

class AccountsRepository
{
	public function getAccounts(User $user)
	{
		return Account::filter()
			->byUserId($user->id)
			->includeBalance()
			->groupById()
			->get();
	}
	
	/**
	 * @param User $user
	 * @param $params
	 * @return Account
	 */
	public function createAccount(User $user, $params)
	{
		$params['user_id'] = $user->id;
		return Account::create($params);
	}
	
	public function deleteAccount(User $user, $accountId)
	{
		$account = Account::byUserId($user->id)->where('id', $accountId)->first();
		if($account) $account->delete();
	}
}