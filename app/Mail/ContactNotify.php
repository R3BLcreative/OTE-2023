<?php

namespace App\Mail;

use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Bus\Queueable;
use App\Models\ContactMsg;

class ContactNotify extends Mailable implements ShouldQueue {
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
		$name = ucwords($this->msg->fname . ' ' . $this->msg->lname);

		return $this->subject('NEW CONTACT FORM SUBMISSION: ' . $this->msg->subject)->replyTo($this->msg->email, $name)->view('emails.contact-notify');
	}
}
