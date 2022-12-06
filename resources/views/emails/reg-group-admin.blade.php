<!DOCTYPE html>
<html>

<head>
	<title>Group Registration Form Admin Notification Email</title>
</head>

<body>
	<p>Hey OTE Admin,</p>

	<p>This is an automated message sent from the OTECamp.com website. A new group registration form submission has been submitted at <strong>{{ date('h:i A', strtotime('now')); }} on {{ date('F d, Y', strtotime('now')) }}</strong>.</p>

	<p>The details of their submission are listed below for your reference. Please be sure to respond to them within 1 week. <strong>Simply reply to this email to send them a response.</strong></p>

	<ul>
		<li><strong>Group Name:</strong> {{ $group->group }}</li>
		<li><strong>Mailing Address:</strong><br>
			{{ $group->street }}<br>
			{{ $group->city }}, {{ $group->state }} {{ $group->zip }}<br><br><br>
		</li>
		<li><strong>Leader Name:</strong> {{ $group->fname.' '.$group->lname }}</li>
		<li><strong>Phone:</strong> {{ $group->phone }}</li>
		<li><strong>Email:</strong> {{ $group->email }}<br><br><br></li>
		<li><strong>Group Size:</strong> {{ $group->count }}</li>
		<li><strong>Marketing Origin:</strong><br>
			{{ $group->marketing }}
		</li>
	</ul>
</body>

</html>