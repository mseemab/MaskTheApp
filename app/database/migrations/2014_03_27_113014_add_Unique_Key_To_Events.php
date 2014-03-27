<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddUniqueKeyToEvents extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::table('events', function(Blueprint $table) {
            $table->string('unique_key');
        });
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
	    Schema::table('events', function(Blueprint $table) {
            $table->dropColumn('unique_key');
        });
	}

}