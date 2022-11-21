<?php

namespace App\Mail;

use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Bus\Queueable;
use App\Models\Group;

class GroupRegAdminNotify extends Mailable implements ShouldQueue {
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
		$name = $this->group->fname . ' ' . $this->group->lname;

		return $this->subject('NEW GROUP REGISTRATION: ' . $this->group->group)->replyTo($this->group->email, $name)->view('emails.reg-group-admin');
	}
}
