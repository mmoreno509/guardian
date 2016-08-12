<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class ExpensesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::all()->each(function(User $user){
        	
        	for($i = 0; $i < 5; $i++){
				$user->expensesAccounts()->save(factory(\App\Models\Expenses\Account::class)->make());
			}
			
			for($i = 0; $i < 5; $i++){
				$user->expensesCategories()->save(factory(\App\Models\Expenses\Category::class)->make());
			}
			
			//$accountIds = $user->expensesAccounts->pluck('id')->all();
			$categoryIds = $user->expensesCategories->pluck('id')->all();
			
			for($i = 0; $i < 100; $i++){
				$user->expensesTransactions()->save(factory(\App\Models\Expenses\Transaction::class)->make([
					'user_id' => $user->id,
					'category_id' => $categoryIds[array_rand($categoryIds)],
				]));
			}
			
		});
		
		
		
		
    }
}
