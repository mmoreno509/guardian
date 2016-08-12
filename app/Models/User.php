<?php

namespace App\Models;

use App\Models\Expenses\Account;
use App\Models\Expenses\Category;
use App\Models\Expenses\Transaction;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User
 * @package App\Models
 * @property string name
 * @property string email
 * @property string password
 * @property Collection expensesAccounts
 * @property Collection expensesCategories
 * @property Collection expensesTransactions
 */
class User extends Authenticatable
{
    protected $fillable = ['name', 'email', 'password'];
    protected $hidden = ['password', 'remember_token'];
	protected $dates = ['created_at', 'updated_at'];
	
	//
	// RELATIONS
	//
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function expensesAccounts()
	{
		return $this->hasMany(Account::class, 'user_id');
	}
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function expensesCategories()
	{
		return $this->hasMany(Category::class, 'user_id');
	}
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function expensesTransactions()
	{
		return $this->hasMany(Transaction::class, 'user_id');
	}
	
	
}
