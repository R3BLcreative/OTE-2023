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
		Schema::create('callsheet', function (Blueprint $table) {
			$table->id();
			$table->text('name')->nullable();
			$table->text('church')->nullable();
			$table->text('camp')->nullable();
			$table->text('category');
			$table->boolean('called')->default(false);
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('callsheet');
	}
};