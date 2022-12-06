<!DOCTYPE html>
<html>

<head>
	<title>Registration Form User Notification Email</title>
</head>

<body>
	@if($reg->type == 'camper')
	<p>Hey {{ $reg->parent_fname }},</p>
	@else
	<p>Hey {{ $reg->fname }},</p>
	@endif

	<p>Thanks for being one of the greatest things about camp! This message is simply a courtesy message to let you know that we have received your registration form submission. We are looking forward to you or your child joining us for camp!</p>

	<p>Your submission has also been sent to your group leader for their records and group management purposes. If you have any questions regarding campl, please direct those to your group leader.</p>

	<p>The details you submitted on the form are listed below for your reference. If you see something wrong with your submission, please feel free to reply to this email.</p>

	<br>
	<hr>
	<br>
	<h2>{{ ucfirst($reg->type) }} Details</h2>

	<ul>
		<li><strong>Group:</strong> {{ $reg->group->group }}</li>
		<li><strong>Registration Type:</strong> {{ $reg->type }}</li>
		<li><strong>Name:</strong> {{ $reg->fname.' '.$reg->lname }}</li>

		@if($reg->type == 'camper')
		<li><strong>Completed Grade:</strong> {{ $reg->grade }}</li>
		@endif

		<li><strong>Birthday:</strong> {{ date('m-d-Y', $reg->birthday) }}</li>
		<li><strong>Age:</strong> {{ $reg->age }}</li>
		<li><strong>Shirt Size:</strong> {{ $reg->shirt }}</li>
		<li><strong>Gender:</strong> {{ $reg->gender }}</li>
		<li><strong>Mailing Address:</strong><br>
			{{ $reg->street }}<br>
			{{ $reg->city }}, {{ $reg->state }} {{ $reg->zip }}<br><br><br>
		</li>
	</ul>
	@if($reg->type == 'camper')

	<br>
	<hr>
	<br>
	<h2>Parent/Gaurdian Details</h2>

	<ul>
		<li><strong>Name:</strong> {{ $reg->parent_fname.' '.$reg->parent_lname }}</li>
		<li><strong>Relationship:</strong> {{ $reg->parent_rel }}</li>
		<li><strong>Email:</strong> {{ $reg->parent_email }}</li>
		<li><strong>Cell Phone:</strong> {{ $reg->parent_cell }}</li>

		@if($reg->parent_home)
		<li><strong>Home Phone:</strong> {{ $reg->parent_home }}</li>
		@endif

		@if($reg->parent_work)
		<li><strong>Work Phone:</strong> {{ $reg->parent_work }}</li>
		@endif

	</ul>

	@endif

	<br>
	<hr>
	<br>
	<h2>Medical Details</h2>

	<ul>

		@php
		$conditions = implode(', ', array_filter(json_decode($reg->conditions, true)));
		@endphp
		<li><strong>Conditions:</strong> {{ $conditions }}</li>
		<li><strong>Conditions Explained:</strong><br>
			{{ $reg->condition_details }}
		</li>
		<li><strong>Allergies:</strong><br>
			{{ $reg->allergies }}
		</li>

		@if($reg->type == 'camper')
		<li>
			<strong>Immunizations:</strong><br>
			@if($reg->imm_optout === true)
			Camper parent/gaurdian has chosen to not have child immunized.
			@else
			<strong>DPT/DT:</strong> {{ date('m-d-Y', $reg->imm_dptdt) }}<br>
			<strong>Polio:</strong> {{ date('m-d-Y', $reg->imm_polio) }}<br>
			<strong>MMR:</strong> {{ date('m-d-Y', $reg->imm_mmr) }}<br>
			<strong>TB:</strong> {{ date('m-d-Y', $reg->imm_tb) }}
			@endif
		</li>
		@endif

		<li><strong>Medications:</strong><br>
			{{ $reg->medications }}
		</li>

	</ul>

	<br>
	<hr>
	<br>
	<h2>Emergency Details</h2>

	<ul>
		<li><strong>Emergency Contact:</strong> {{ $reg->ice_fname.' '.$reg->ice_lname }}</li>
		<li><strong>Phone:</strong> {{ $reg->ice_phone }}</li>

		@if($reg->ins_company)
		<li><strong>Insurance Company:</strong> {{ $reg->ins_company }}</li>
		@endif

		@if($reg->ins_name)
		<li><strong>Name of Insured:</strong> {{ $reg->ins_name }}</li>
		@endif

		@if($reg->ins_policy)
		<li><strong>Policy #:</strong> {{ $reg->ins_policy }}</li>
		@endif

		<li><strong>Doctor:</strong> {{ $reg->doctor }}</li>
		<li><strong>Doctor Phone:</strong> {{ $reg->doc_phone }}</li>

		@if($reg->dentist)
		<li><strong>Dentist:</strong> {{ $reg->dentist }}</li>
		@endif

		@if($reg->dent_phone)
		<li><strong>Dentist Phone:</strong> {{ $reg->dent_phone }}</li>
		@endif
	</ul>

	<br>
	<hr>
	<br>

	<p>Your submission was received at <strong>{{ date('h:i A', strtotime('now')); }} on {{ date('F d, Y', strtotime('now')) }}</strong>.</p>

	<p>In His grace,<br>
		OTE Staff</p>