<?php

use Illuminate\Database\Seeder;
use App\Project;
use Faker\Factory as Faker;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
			Project::truncate();
			
			factory(Project::class, 10) -> create();
	/*		$faker = Faker::create('en_US');

			for($i = 0; $i < 10; $i++){
				Project::create([
					'title' => $faker -> name
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
