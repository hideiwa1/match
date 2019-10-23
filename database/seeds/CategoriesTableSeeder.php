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
			Category::create(
											[
												'name' => 'レベニューシェア案件',
												'delete_flg' => false
											]);
    }
}
