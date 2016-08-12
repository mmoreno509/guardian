<?php

namespace App\Http\Requests\Expenses;

use App\Http\Requests\Request;
use App\Models\Expenses\TransactionTypesEnum;

class CategoryStore extends Request
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
        return [
            'name' => 'required',
			'type' => 'required|in:' . implode(',', TransactionTypesEnum::getKeys()),
			'budget' => 'numeric|min:0'
        ];
    }
}
