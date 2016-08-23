<?php
namespace App\Repositories\Expenses;

use App\Models\Expenses\Account;
use App\Models\Expenses\Category;
use App\Models\Expenses\Transaction;
use App\Models\Expenses\TransactionTypesEnum;
use App\Models\User;
use Carbon\Carbon;

class TransactionsRepository
{
	protected function createTransaction(User $user, Carbon $at, $type, Category $category, $description, $amount)
	{
		$transaction = Transaction::create([
			'user_id' => $user->id,
			'type' => $type,
			'category_id' => $category->id,
			'description' => $description,
			'amount' => $amount,
			'at' => $at,
		]);
		return $transaction;
	}
	
	public function createIncome(User $user, Carbon $at, Category $category, Account $account, $description, $amount)
	{
		$transaction = $this->createTransaction($user, $at, TransactionTypesEnum::INCOME, $category, $description, $amount);
		$transaction->accounts()->save($account, [ 'amount' => $amount ]);
		return $transaction;
	}
	
	public function createExpense(User $user, Carbon $at, Category $category, Account $account, $description, $amount)
	{
		$amount *= -1;
		$transaction = $this->createTransaction($user, $at, TransactionTypesEnum::EXPENSE, $category, $description, $amount);
		$transaction->accounts()->save($account, [ 'amount' => $amount ]);
		return $transaction;
	}
}