<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
			Category::truncate();
			
			DB::table('categories')->insert([
				[
					'id' => 1,
					'name' => '単発案件',
					'delete_flg' => false
				],
				[
					'id' => 2,
					'name' => 'レベニューシェア案件',
					'delete_flg' => false
				]
			]);
    }
}
