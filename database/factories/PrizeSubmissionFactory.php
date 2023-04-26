<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class PrizeSubmissionFactory extends Factory {
	public function definition() {
		return [
			'name' => fake()->name(),
			'church' => fake()->randomElement(['FBC Church', 'Jesus Church', 'FBC Small Town', 'Some Church', 'His Church', 'FBC Again', 'Another FBC', 'Random Church', 'His FBC']),
			'type' => fake()->randomElement(['mega', 'ducky']),
			'called' => fake()->boolean(),
			'created_at' => fake()->dateTimeThisYear('+2 months'),
			'updated_at' => fake()->dateTimeThisYear('+2 months'),
		];
	}
}
