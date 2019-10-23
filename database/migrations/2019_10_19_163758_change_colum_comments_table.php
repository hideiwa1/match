<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeColumCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
			Schema::table('comments', function (Blueprint $table) {
				$table->string('delete_flg') -> nullable() -> change();
				$table->renameColumn('send_user_id', 'user_id');
				$table->renameColumn('send_product_id', 'project_id');
			});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
			Schema::table('comments', function (Blueprint $table) {
				$table->string('delete_flg') -> change();
				$table->renameColumn('user_id', 'send_user_id');
				$table->renameColumn('project_id', 'send_product_id');
			});
    }
}
