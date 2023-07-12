<?php

return [
	/*
    |--------------------------------------------------------------------------
    | Application Settings
    |--------------------------------------------------------------------------
    |
    | In here you can define all the settings used in your app, it will be
    | available as a settings page where user can update it if needed
    | create sections of settings with a type of input.
    */
	'app' => [
		'title'			=> 'Camp',
		'desc'			=> 'All the general settings for camp',
		'elements'	=> [
			[
				'data'	=> 'string',
				'name'	=> 'camp_open',
				'value'	=> '11/01/2022'
			],
			[
				'data'	=> 'string',
				'name'	=> 'camp_close',
				'value'	=> '07/22/2023'
			],
			[
				'data'	=> 'string',
				'name'	=> 'camp_deposit',
				'value'	=> '$130'
			],
			[
				'data'	=> 'string',
				'name'	=> 'camp_deposit_due',
				'value'	=> '06/05/2023'
			],
			[
				'data'	=> 'string',
				'name'	=> 'camp_cost',
				'value'	=> '$250'
			],
			[
				'data'	=> 'string',
				'name'	=> 'late_cost',
				'value'	=> '$250'
			],
			[
				'data'	=> 'string',
				'name'	=> 'camp_dates',
				'value'	=> '07/17/23 - 07/21/23'
			],
			[
				'data'	=> 'string',
				'name'	=> 'camp_deadline',
				'value'	=> '07/16/23'
			],
			[
				'data'	=> 'int',
				'name'	=> 'camp_year',
				'value'	=> 2023
			],
			[
				'data'	=> 'string',
				'name'	=> 'camp_reg_open',
				'value'	=> '12/05/2022'
			],
			[
				'data'	=> 'string',
				'name'	=> 'camp_reg_close',
				'value'	=> '07/18/2023'
			],
		],
	]
];
