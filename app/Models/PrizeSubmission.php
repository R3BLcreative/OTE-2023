<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;

class PrizeSubmission extends Model {
	use HasFactory;

	protected $fillable = [
		'name',
		'church',
		'type',
		'called',
	];

	protected $casts = [
		'called' => 'boolean',
	];

	protected function name(): Attribute {
		return Attribute::make(
			set: fn ($value) => Str::title($value),
		);
	}

	protected function church(): Attribute {
		return Attribute::make(
			set: fn ($value) => Str::title($value),
		);
	}

	protected function type(): Attribute {
		return Attribute::make(
			set: fn ($value) => Str::lower($value),
		);
	}
}
