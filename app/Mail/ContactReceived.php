<?php

namespace App\Mail;

use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Bus\Queueable;
use App\Models\ContactMsg;

class ContactReceived extends Mailable implements ShouldQueue {
	use Queueable, SerializesModels;

	public $msg;

	/**
	 * Create a new message instance.
	 *
	 * @return void
	 */
	public function __construct(ContactMsg $msg) {
		$this->afterCommit();
		$this->msg = $msg;
	}

	/**
	 * Build the message.
	 *
	 * @return $this
	 */
	public function build() {
		return $this->subject('SUCCESS! We got your message sent from OTECamp.com')->replyTo('admin@otecamp.com', 'OTE Admin')->view('emails.contact-received');
	}
}
