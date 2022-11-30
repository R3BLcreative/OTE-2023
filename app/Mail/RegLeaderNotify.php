<?php

namespace App\Mail;

use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Bus\Queueable;
use App\Models\Registration;

class RegLeaderNotify extends Mailable implements ShouldQueue {
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
		$name = $this->reg->fname . ' ' . $this->reg->lname;

		return $this->subject($name . ' just registered with your group for preteen camp.')->replyTo('admin@otecamp.com', 'OTE Admin')->view('emails.reg-leader');
	}
}
