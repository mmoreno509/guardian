<?php
namespace App\Http\Controllers\Expenses;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
	public function index()
	{
		return view('pages.expenses.home');
	}
}