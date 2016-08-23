<?php

namespace App\Http\Controllers\Expenses;

use App\Http\Requests\Expenses\CategoryStore;
use App\Models\Expenses\Category;
use App\Models\Expenses\TransactionTypesEnum;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoryCollection = Category::byUserId($this->user->id)->orderBy('budget', 'DESC')->get();
		$incomeCategoryCollection = $categoryCollection->where('type', TransactionTypesEnum::INCOME);
		$expenseCategoryCollection = $categoryCollection->where('type', TransactionTypesEnum::EXPENSE);
		$totalBudget = $incomeCategoryCollection->sum('budget') - $expenseCategoryCollection->sum('budget');
		return view('pages.expenses.category.index', compact(
			'categoryCollection',
			'expenseCategoryCollection',
			'incomeCategoryCollection',
			'totalBudget'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.expenses.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryStore $request)
    {
		$category = Category::create(['user_id' => $this->request->user()->id] + $request->all());
		flash()->success("Success!", "Your new category is added.");
		return redirect()->to('/expenses/category');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$category = Category::find($id);
		return view('pages.expenses.category.create', compact('category'));
    }
	
	/**
	 * Update the specified resource in storage.
	 *
	 * @param CategoryStore|Request $request
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
    public function update(CategoryStore $request, $id)
    {
    	$category = Category::find($id);
		$category->fill($request->only('name', 'budget'));
		$category->save();
		flash()->success("Success!", "Your category is modified.");
		return redirect()->to('/expenses/category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
		if($category) $category->delete();
		return redirect()->back();
    }
}
