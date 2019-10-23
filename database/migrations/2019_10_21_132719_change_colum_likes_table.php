<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeColumLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
		{
			Schema::table('likes', function (Blueprint $table) {
				$table->boolean('delete_flg') -> default(false) -> change();
			
			$table->renameColumn('product_id', 'project_id');
			});
		}

	/**
     * Reverse the migrations.
     *
     * @return void
     */
	public function down()
	{
		Schema::table('likes', function (Blueprint $table) {
			$table->boolean('delete_flg') -> change();
		
		$table->renameColumn('project_id', 'product_id');
		});
	}
}
