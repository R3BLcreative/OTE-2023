<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ContactMsg extends Model {
	use HasFactory;

	protected $fillable = [
		'fname',
		'lname',
		'email',
		'subject',
		'message'
	];
}
