<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses_account_transactions', function(Blueprint $table){
        	$table->increments('id');
			$table->integer('account_id')->unsigned();
			$table->integer('transaction_id')->unsigned();
			$table->float('amount');
			// Relations
			$table->foreign('account_id')->references('id')->on('expenses_accounts')->onDelete('cascade');
			$table->foreign('transaction_id')->references('id')->on('expenses_transactions')->onDelete('cascade');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('expenses_account_transactions');
    }
}
