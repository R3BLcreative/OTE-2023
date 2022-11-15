<!DOCTYPE html>
<html>

<head>
	<title>Contact Form Admin Notification Email</title>
</head>

<body>
	<p>Hey OTE Admin,</p>

	<p>This is an automated message sent from the OTECamp.com website. A new contact form submission has been submitted at <strong>{{ date('h:i A', strtotime('now')); }} on {{ date('F d, Y', strtotime('now')) }}</strong>.</p>

	<p>The details of their submission are listed below for your reference. Please be sure to respond to them within 24-48 hours. <strong>Simply reply to this email to send them a response.</strong></p>

	<ul>
		<li><strong>Name:</strong> {{ ucwords($msg->fname.' '.$msg->lname) }}</li>
		<li><strong>Email:</strong> <a href="mailto:{{ $msg->email }}?subject=Regarding your OTE Camp contact form submission">{{ $msg->email }}</a></li>
		<li><strong>Subject:</strong> {{ $msg->subject }}</li>
		<li><strong>Message:</strong><br><br>
			{{ $msg->message }}
		</li>
	</ul>
</body>

</html>