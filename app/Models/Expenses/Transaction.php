<?php

namespace App\Models\Expenses;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

/**
 * Class Transaction
 * @package App\Models\Expenses
 * @property int id
 * @property int user_id
 * @property string type
 * @property string type_name
 * @property int category_id
 * @property string description
 * @property float amount
 * @property Carbon at
 * @property int created_at
 * @property int updated_at
 *
 * @property Category category
 * @property User user
 * @property Collection accounts
 */
class Transaction extends Model
{
	protected $table = 'expenses_transactions';
	protected $fillable = [
		'user_id',
		'type',
		'category_id',
		'description',
		'amount',
		'at'
	];
	protected $dates = ['at', 'created_at', 'updated_at'];
	protected $appends = ['type_name', 'amount_formatted'];
	
	/**
	 * @return Account|null
	 */
	public function getFirstAccount()
	{
		return (count($this->accounts) > 0) ? $this->accounts->first() : null;
	}
	
	//
	// RELATIONS
	//
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function category()
	{
		return $this->belongsTo(Category::class, 'category_id');
	}
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
	public function accounts()
	{
		return $this->belongsToMany(Account::class, 'expenses_account_transactions', 'transaction_id', 'account_id');
	}
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function user()
	{
		return $this->belongsTo(User::class, 'user_id');
	}
	
	//
	// ATTRIBUTES
	//
	
	public function getTypeNameAttribute()
	{
		return TransactionTypesEnum::get($this->attributes['type']);
	}
	
	public function getAmountFormattedAttribute()
	{
		$multiplier = 1;
		if($this->type == TransactionTypesEnum::EXPENSE) $multiplier = -1;
		if($this->type == TransactionTypesEnum::TRANSFER) $multiplier = 0;
		$amount = array_get($this->attributes, 'amount', 0) * $multiplier;
		return formatToMoney($amount);
	}
	
	//
	// SCOPES
	//
	
	/**
	 * @param Builder $query
	 * @param $userId
	 * @return Builder
	 */
	public function scopeByUserId($query, $userId)
	{
		return $query->where('expenses_transactions.user_id', $userId);
	}
	
	/**
	 * @param Builder $query
	 * @param $type
	 * @return Builder
	 */
	public function scopeByType($query, $type)
	{
		$where = (is_array($type)) ? 'whereIn' : 'where';
		return $query->$where('expenses_transactions.type', $type);
	}
	
	/**
	 * @param Builder $query
	 * @param Carbon|null $at
	 * @return Builder
	 */
	public function scopeByMonth($query, Carbon $at = null)
	{
		if(empty($at)) $at = new Carbon();
		$end = clone $at;
		$at->startOfMonth();
		$end->endOfMonth();
		return $query->whereBetween('expenses_transactions.at', [$at, $end]);
	}
	
	/**
	 * @param Builder $query
	 * @return Builder
	 */
	public function scopeDefaultOrder($query)
	{
		return $query->orderBy('at', 'DESC');
	}
	
	/**
	 * @param Builder $query
	 * @return Builder
	 */
	public function scopeSearchBy($query, $search)
	{
		return $query->where('description', 'LIKE', '%'.trim($search).'%');
	}
}
