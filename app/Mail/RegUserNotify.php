<?php

namespace App\Mail;

use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Bus\Queueable;
use App\Models\Registration;

class RegUserNotify extends Mailable implements ShouldQueue {
	use Queueable, SerializesModels;

	public $reg;

	/**
	 * Create a new message instance.
	 *
	 * @return void
	 */
	public function __construct(Registration $reg) {
		$this->afterCommit();
		$this->reg = $reg;
	}

	/**
	 * Build the message.
	 *
	 * @return $this
	 */
	public function build() {
		return $this->subject('SUCCESS! We have received your preteen camp registration.')->replyTo('admin@otecamp.com', 'OTE Admin')->view('emails.reg-user');
	}
}
