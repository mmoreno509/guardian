<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
        	'name' => "Ernesto Perez",
			'email' => "ernesto.perez.torres@gmail.com",
			'password' => bcrypt('secret'),
		]);
    }
}
