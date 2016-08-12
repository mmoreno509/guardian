<?php
namespace App\Models\Expenses;

class AccountTypesEnum
{
	const CHECKINGS = 'check';
	const SAVINGS = 'savings';
	const CREDIT = 'credit';
	const CASH = 'cash';
	
	protected static $enum = [
		self::CHECKINGS => 'Checkings',
		self::SAVINGS => 'Savings',
		self:: CREDIT => 'Credit',
		self::CASH => 'Cash',
	];
	
	/**
	 * @param $key
	 * @param $default
	 * @return mixed
	 */
	public static function get($key, $default = null)
	{
		return array_get(self::$enum, $key, $default);
	}
	
	/**
	 * @return array
	 */
	public static function getAll()
	{
		return self::$enum;
	}
	
	/**
	 * @return array
	 */
	public static function getKeys()
	{
		return array_keys(self::$enum);
	}
}