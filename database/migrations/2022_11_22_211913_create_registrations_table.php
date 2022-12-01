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
			$table->foreignId('group_id')->constrained('groups');
			$table->string('fname');
			$table->string('lname');
			$table->bigInteger('birthday');
			$table->tinyInteger('age');
			$table->tinyInteger('grade')->nullable();
			$table->string('shirt');
			$table->string('gender');
			$table->string('street');
			$table->string('city');
			$table->string('state');
			$table->integer('zip');
			$table->string('parent_fname')->nullable();
			$table->string('parent_lname')->nullable();
			$table->string('parent_rel')->nullable();
			$table->string('parent_email')->nullable();
			$table->string('parent_cell')->nullable();
			$table->string('parent_home')->nullable();
			$table->string('parent_work')->nullable();
			$table->text('conditions')->nullable();
			$table->text('condition_details')->nullable();
			$table->text('allergies')->nullable();
			$table->boolean('imm_optout')->default(false);
			$table->bigInteger('imm_dptdt')->nullable();
			$table->bigInteger('imm_polio')->nullable();
			$table->bigInteger('imm_mmr')->nullable();
			$table->bigInteger('imm_tb')->nullable();
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
			$table->string('ATID')->nullable();
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
