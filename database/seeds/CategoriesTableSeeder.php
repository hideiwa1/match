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
			Categoryß::truncate();
			
			DB::table('categories')->insert([
				[
					'id' => 1,
					'name' => '単発案件',
					'delete_flg' => false
				],
				[
					'id' => 1,
					'name' => 'レベニューシェア案件',
					'delete_flg' => false
				]
			]);
    }
}
