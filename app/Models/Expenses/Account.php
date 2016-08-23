<?php
namespace App\Models\Expenses;

use App\Models\User;
use Carbon\Carbon;
use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

/**
 * Class Account
 * @package App\Models\Expenses
 * @property int user_id
 * @property User user
 * @property string name
 * @property string type
 * @property string type_name
 * @property Carbon created_at
 * @property Carbon updated_at
 */
class Account extends Model
{
    protected $table = 'expenses_accounts';
	protected $fillable = [ 'user_id', 'name', 'type' ];
	protected $dates = ['created_at', 'updated_at'];
	protected $appends = ['type_name'];
	
	//
	// RELATIONS
	//
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function user()
	{
		return $this->belongsTo(User::class, 'user_id');
	}
	
	//
	// Attributes
	//
	
	public function getTypeNameAttribute()
	{
		return AccountTypesEnum::get($this->attributes['type']);
	}
	
	//
	// Scopes
	//
	
	/**
	 * @param Builder $query
	 * @return Builder $this
	 */
	public function scopeFilter($query)
	{
		return $query->select('expenses_accounts.*');
	}
	
	/**
	 * @param Builder $query
	 * @return Builder $this
	 */
	public function scopeGroupById($query)
	{
		return $query->groupBy('expenses_accounts.id');
	}
	
	/**
	 * @param Builder $query
	 * @param $user_id
	 * @return Builder $this
	 */
	public function scopeByUserId($query, $user_id)
	{
		return $query->where('expenses_accounts.user_id', $user_id);
	}
	
	
	/**
	 * @param Builder $query
	 * @return Builder $this
	 */
	public function scopeIncludeBalance($query)
	{
		return $query
			->addSelect(DB::raw('sum(expenses_account_transactions.amount) as balance'))
			->leftJoin('expenses_account_transactions', 'expenses_accounts.id', '=', 'expenses_account_transactions.account_id');
	}
	
	
	
}
