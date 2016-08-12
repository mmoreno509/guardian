<?php


namespace App\Models\Expenses;


class TransactionTypesEnum
{
	const EXPENSE = 'expense';
	const INCOME = 'income';
	const TRANSFER = 'transfer';
	
	protected static $enum = [
		self::EXPENSE => 'Expense',
		self::INCOME => 'Income',
		self::TRANSFER => 'Transfer'
	];
	
	/**
	 * @param string $key
	 * @param mixed $default
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