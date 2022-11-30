<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Registration extends Model {
	use HasFactory;

	protected $fillable = [
		'group_id',
		'fname',
		'lname',
		'birthday',
		'age',
		'grade',
		'shirt',
		'gender',
		'street',
		'city',
		'state',
		'zip',
		'parent_fname',
		'parent_lname',
		'parent_rel',
		'parent_email',
		'parent_cell',
		'parent_home',
		'parent_work',
		'conditions',
		'condition_details',
		'allergies',
		'imm_optout',
		'imm_dptdt',
		'imm_polio',
		'imm_mmr',
		'imm_tb',
		'medications',
		'ice_fname',
		'ice_lname',
		'ice_phone',
		'ins_company',
		'ins_name',
		'ins_policy',
		'doctor',
		'doc_phone',
		'dentist',
		'dent_phone',
		'esign',
		'camp',
		'year',
		'type'
	];

	public function group() {
		return $this->belongsTo(Group::class);
	}
}
