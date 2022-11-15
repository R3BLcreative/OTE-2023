<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider {
	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register() {
		//
	}

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot() {
		Blade::anonymousComponentNamespace('layouts', 'layouts');
		Blade::anonymousComponentNamespace('components', 'components');
		Blade::anonymousComponentNamespace('emails', 'emails');
		Blade::anonymousComponentNamespace('components.forms', 'forms');
		Blade::anonymousComponentNamespace('components.forms.fields', 'fields');
	}
}
