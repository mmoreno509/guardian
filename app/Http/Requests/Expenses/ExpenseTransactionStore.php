<?php

namespace App\Http\Requests\Expenses;

use App\Http\Requests\Request;
use App\Models\Expenses\TransactionTypesEnum;
use Auth;

class ExpenseTransactionStore extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
		$user = Auth::user();
		$type = TransactionTypesEnum::EXPENSE;
        return [
        	'at' => 			"required|date",
            'category_id' => 	"required|exists:expenses_categories,id,user_id,{$user->id},type,{$type}",
			'account_id' => 	"required|exists:expenses_accounts,id,user_id,{$user->id}",
			'amount' => 		"required|numeric",
			'description' => 	"present",
        ];
    }
}
