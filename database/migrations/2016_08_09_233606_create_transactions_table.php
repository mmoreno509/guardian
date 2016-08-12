<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('expenses_transactions', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->enum('type', \App\Models\Expenses\TransactionTypesEnum::getKeys());
			$table->integer('category_id')->nullable()->unsigned();
			$table->string('description')->nullable();
			$table->float('amount')->default(0);
			$table->dateTime('at')->index();
			$table->timestamps();
			// Foreign keys
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
			$table->foreign('category_id')->references('id')->on('expenses_categories')->onDelete('SET NULL');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
		Schema::drop('expenses_transactions');
    }
}
