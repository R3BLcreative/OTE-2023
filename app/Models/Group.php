<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Group extends Model {
	use HasFactory;

	protected $fillable = [
		'group',
		'street',
		'city',
		'state',
		'zip',
		'fname',
		'lname',
		'phone',
		'email',
		'count',
		'deposit',
		'marketing',
		'camp',
		'year'
	];
}
