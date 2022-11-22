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
		Schema::create('registrations', function (Blueprint $table) {
			$table->id();
			$table->foreignId('group')->constrained('groups');
			$table->string('fname');
			$table->string('lname');
			$table->date('birthday');
			$table->tinyInteger('age');
			$table->string('shirt');
			$table->string('gender');
			$table->string('street');
			$table->string('city');
			$table->string('state');
			$table->integer('zip');
			$table->text('conditions')->nullable();
			$table->text('condition_details')->nullable();
			$table->text('allergies')->nullable();
			$table->text('medications')->nullable();
			$table->string('ice_fname');
			$table->string('ice_lname');
			$table->string('ice_phone');
			$table->string('ins_company')->nullable();
			$table->string('ins_name')->nullable();
			$table->string('ins_policy')->nullable();
			$table->string('doctor');
			$table->string('doc_phone');
			$table->string('dentist')->nullable();
			$table->string('dent_phone')->nullable();
			$table->string('esign');
			$table->tinyInteger('camp');
			$table->integer('year');
			$table->string('type');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('registrations');
	}
};
