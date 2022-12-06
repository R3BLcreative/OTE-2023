<!DOCTYPE html>
<html>

<head>
	<title>Group Registration Form Leader Notification Email</title>
</head>

<body>
	<p>Hey {{ $group->fname }},</p>

	<p><strong>PLEASE READ through this email in its entirety. It contains important information regarding your next steps. Thanks!</strong></p>

	<p>Thanks for being one of the greatest things about camp! This message is simply a courtesy message to let you know that we have received your registration form submission. One of our registration admins will be reaching out to you within the next week. Feel free to reply to this message if you have any further questions, or would like to contact us directly in the future.</p>

	<p>The details you submitted on the form are listed below for your reference. If you see something wrong with your submission, please feel free to reply to this email.</p>

	<ul>
		<li><strong>Group Name:</strong> {{ $group->group }}</li>
		<li><strong>Mailing Address:</strong><br>
			{{ $group->street }}<br>
			{{ $group->city }}, {{ $group->state }} {{ $group->zip }}<br><br><br>
		</li>
		<li><strong>Leader Name:</strong> {{ $group->fname.' '.$group->lname }}</li>
		<li><strong>Phone:</strong> {{ $group->phone }}</li>
		<li><strong>Email:</strong> {{ $group->email }}<br><br><br></li>
		<li><strong>Estimated Group Size:</strong> {{ $group->count }}</li>
		</li>
	</ul>

	<h1>Next Steps</h1>

	<p>Your next step will be to pay your camp deposit. Your spots at camp are not garaunteed until this deposit is recieved. Based off your expected group size, your initial deposit amount is <strong>${{ $group->deposit }}</strong></p>

	<p>Please mail your deposit check made payable to <em>Over the Edge Preteen Camp</em> to the following address:</p>

	<p><strong>Over the Edge Preteen Camp</strong><br>
		4100 North Laurent<br>
		Victoria, TX 77901</p>

	<p>
		<em>Please make sure you put your group's registered name in the notes section of your check.</em>
	</p>

	<h2>Start Registering Adult Sponsors & Child Campers</h2>

	<p>Your adult sponsors and parents can start registering prior to your deposit being received. Bellow are the links for each to register.</p>

	<ul>
		<li><strong>Adult Sponsors: </strong>
			<a href="{{ route('registration.adult') }}" target="_blank">{{ route('registration.adult') }}</a>
		</li>
		<li><strong>Child Campers: </strong>
			<a href="{{ route('registration.child') }}" target="_blank">{{ route('registration.child') }}</a>
		</li>
	</ul>

	<p>Your submission was received at <strong>{{ date('h:i A', strtotime('now')); }} on {{ date('F d, Y', strtotime('now')) }}</strong>.</p>

	<p>In His grace,<br>
		OTE Staff</p>