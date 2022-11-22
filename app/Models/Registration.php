<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Registration extends Model {
	use HasFactory;

	protected $fillable = [
		'group',
		'fname',
		'lname',
		'birthday',
		'age',
		'shirt',
		'gender',
		'street',
		'city',
		'state',
		'zip',
		'conditions',
		'condition_details',
		'allergies',
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
		return $this->hasOne(Group::class);
	}
}
