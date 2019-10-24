<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeColumUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
	public function up()
	{
		Schema::table('users', function (Blueprint $table) {
			$table->string('pic') -> after('email')-> nullable();
			$table->text('comment')-> after('pic') -> nullable();
			$table->boolean('delete_flg') -> after('comment') ->default(false);
		});
	}

	/**
     * Reverse the migrations.
     *
     * @return void
     */
	public function down()
	{
		Schema::table('users', function (Blueprint $table) {
			$table->dropColumn('pic');
			$table->dropColumn('comment');
			$table->dropColumn('delete_flg');
		});
	}
}
