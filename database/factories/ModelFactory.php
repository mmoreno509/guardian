<?php

$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

//
// EXPENSES
//

$factory->define(App\Models\Expenses\Account::class, function (Faker\Generator $faker) {
	return [
		'name' => $faker->word,
		'type' => $faker->randomElement(\App\Models\Expenses\AccountTypesEnum::getKeys()),
	];
});

$factory->define(App\Models\Expenses\Category::class, function (Faker\Generator $faker) {
	return [
		'name' => $faker->word,
		'type' => $faker->randomElement(\App\Models\Expenses\TransactionTypesEnum::getKeys()),
		'budget' => $faker->randomFloat(),
	];
});

$factory->define(App\Models\Expenses\Transaction::class, function (Faker\Generator $faker) {
	return [
		'description' => $faker->word,
		'type' => $faker->randomElement(\App\Models\Expenses\TransactionTypesEnum::getKeys()),
		'amount' => $faker->randomFloat(null, null),
		'at' => $faker->dateTimeBetween('-3 months', 'now'),
	];
});
