<?php

namespace App\Http\Controllers;

use Twilio\TwiML\MessagingResponse;
use Illuminate\Http\Request;
use App\Models\PrizeSubmission;

class CallsheetController extends Controller {
	public function list(Request $request) {
		// Validate request
		$request->validate(
			[
				'type' => 'required|string',
				'count' => 'required|integer',
				'eoc' => 'required|string',
			],
			[
				'required' => 'This field is required.',
			]
		);

		// Pull random list names matching request count, type, and called flag
		if ($request->input('eoc') === 'no') {
			$results = PrizeSubmission::select('id', 'name', 'church')->where('type', $request->input('type'))->where('called', false)->inRandomOrder()->groupBy('name', 'church')->limit($request->input('count'))->get();
		} else {
			$results = PrizeSubmission::select('id', 'name', 'church')->where('type', $request->input('type'))->inRandomOrder()->groupBy('name', 'church')->limit($request->input('count'))->get();
		}

		if (!$results) {
			$names = [];
			$gooseEgg = true;
		} else {
			$names = $results;
			$gooseEgg = false;
		}

		return view('pages.callsheet')->with('names', $names)->with('gooseEgg', $gooseEgg);
	}

	public function called(int $id) {
		$results = PrizeSubmission::where('id', $id)->update(['called' => true]);
		http_response_code(202);
		return json_encode([
			'message' => 'Name marked called',
			'id' => $id
		]);
	}

	public function twilio() {
		$MSID 	= $_POST['MessageSid'];
		$from 	= $_POST['From'];
		$body 	= preg_split('/\r\n|\r|\n/', $_POST['Body']);
		$body2 	= $_POST['Body'];

		$help 	= "Need help? Here's how you should format your prize entries:\n\n" .
			"Ducky or Mega\n" .
			"Church Name\n" .
			"Camper Name\n" .
			"Camper Name\n" .
			"Another Name";

		if (!empty($MSID) && count($body) >= 3) {
			if ($this->type_is_correct(strtolower($body[0]))) {
				$names = $this->get_names($body);

				$args = [
					'type'		=> $this->fix_duckie(strtolower($body[0])),
					'church' 	=> strtolower($body[1]),
				];

				foreach ($names as $name) {
					$args['name'] = $name;
					PrizeSubmission::insert($args);
				}

				$rtxt = (strtolower($body[0]) == 'mega') ? 'mega challenge' : 'rubber ducky';

				/* SEND RESPONSE */
				$response = new MessagingResponse();
				$response->message("SUCCESS!!!! Your $rtxt entry has been received and submitted.\n\nREMEMBER: Entries are randomly called, we can't gaurantee that every entry will be called. Once an entry has been called, it is removed from the list until the final morning of prizes. All entries for the week are used on the final morning prize callsheet.");
				echo $response;
			} elseif (strtolower($body2) == 'format') {
				/* SEND HELP RESPONSE */
				$response = new MessagingResponse();
				$response->message($help);
				echo $response;
			} else {
				/* SEND ERROR RESPONSE */
				$response = new MessagingResponse();
				$response->message("UH OH!!! Your entry was not submitted! Please check that it is formatted correctly and try again.\n\n" . $help);
				echo $response;
			}
		} else {
			/* SEND ERROR RESPONSE */
			$response = new MessagingResponse();
			$response->message("UH OH!!! Your entry was not submitted! Please check that it is formatted correctly and try again.\n\n" . $help);
			echo $response;
		}
	}

	private function get_names($body) {
		$x 		= count($body);
		$names 	= array();

		for ($i = 2; $i < $x; $i++) {
			$names[] = strtolower($body[$i]);
		}

		return $names;
	}


	private function type_is_correct($type) {
		if (!empty($type)) {
			switch ($type) {
				case 'ducky':
				case 'duckie':
				case 'mega':
					return true;
					break;
				default:
					return false;
					break;
			}
		} else {
			return false;
		}
	}


	private function fix_duckie($type) {
		switch ($type) {
			case 'ducky':
			case 'duckie':
				return 'ducky';
				break;
			default:
				return $type;
				break;
		}
	}
}
