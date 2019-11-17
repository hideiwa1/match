<?php

use Illuminate\Database\Seeder;
use App\User;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
			User::truncate();

			factory(User::class, 70) -> create();
			/*$faker = Faker::create('en_US');

			for($i = 0; $i < 10; $i++){
				User::create([
					$table->string('title');
					$table->string('comment');
					$table->integer('min_price');
					$table->integer('max_price');
					$table->integer('category_id');
					$table->integer('user_id');
					$table->boolean('delete_flg');
				])
			}*/
    }
}
