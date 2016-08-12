<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExpensesAccountControllerTest extends TestCase
{
	/** @test */
	public function it_shows_the_form_to_create_a_new_account()
	{
		$this->visit('expenses/account/create')->see('New Account');
	}
}