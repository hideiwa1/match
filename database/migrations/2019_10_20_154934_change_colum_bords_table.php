<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeColumBordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
	public function up()
	{
		Schema::table('bords', function (Blueprint $table) {
			$table->boolean('delete_flg') -> default(false) -> change();
		});
	}

	/**
     * Reverse the migrations.
     *
     * @return void
     */
	public function down()
	{
		Schema::table('bords', function (Blueprint $table) {
			$table->boolean('delete_flg') -> change();
		});
	}
}
