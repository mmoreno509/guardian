<?php

namespace App\Models\Expenses;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Category
 * @package App\Models\Expenses
 * @property int id
 * @property int user_id
 * @property string type
 * @property string type_name
 * @property string name
 * @property float budget
 * @property float budget_formatted
 * @property User user
 * @property Carbon created_at
 * @property Carbon updated_at
 * @property Carbon|null deleted_at
 */
class Category extends Model
{
	use SoftDeletes;
	
	protected $table = 'expenses_categories';
	protected $fillable = [ 'user_id', 'type', 'name', 'budget' ];
	protected $dates = ['created_at', 'updated_at', 'deleted_at'];
	protected $appends = ['type_name', 'budget_formatted'];
	
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
	// ATTRIBUTES
	//
	
	public function getTypeNameAttribute()
	{
		return TransactionTypesEnum::get($this->attributes['type']);
	}
	
	public function getBudgetFormattedAttribute()
	{
		return empty($this->attributes['budget']) ? '' : '$ ' . money_format('%.2n', $this->attributes['budget']);
	}
	
	//
	// SCOPES
	//
	
	public function scopeByUserId($query, $userId)
	{
		return $query->where('expenses_categories.user_id', $userId);
	}
	
	public function scopeByType($query, $type)
	{
		$func = is_array($type) ? 'whereIn' : 'where';
		return $query->$func('expenses_categories.type', $type);
	}
	
	
	
	
}
