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
				$table->string('pic') -> _default('https://laravalsample.s3.ap-northeast-1.amazonaws.com/silet.png')->change();
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
				$table->string('pic') -> _default('');
			});
    }
}
