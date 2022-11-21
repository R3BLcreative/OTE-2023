<?php

namespace App\Mail;

use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Bus\Queueable;
use App\Models\Group;

class GroupRegLeaderNotify extends Mailable implements ShouldQueue {
	use Queueable, SerializesModels;

	public $group;

	/**
	 * Create a new message instance.
	 *
	 * @return void
	 */
	public function __construct(Group $group) {
		$this->afterCommit();
		$this->group = $group;
	}

	/**
	 * Build the message.
	 *
	 * @return $this
	 */
	public function build() {
		return $this->subject('SUCCESS! Your camp group registration has been received.')->replyTo('admin@otecamp.com', 'OTE Admin')->view('emails.reg-group-leader');
	}
}
