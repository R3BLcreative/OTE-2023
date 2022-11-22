<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('groups', function (Blueprint $table) {
			$table->id();
			$table->string('group');
			$table->string('street');
			$table->string('city');
			$table->string('state');
			$table->integer('zip');
			$table->string('fname');
			$table->string('lname');
			$table->string('phone');
			$table->string('email');
			$table->integer('count');
			$table->integer('deposit');
			$table->text('marketing');
			$table->tinyInteger('camp');
			$table->integer('year');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('groups');
	}
};
