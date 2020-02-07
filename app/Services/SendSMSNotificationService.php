<?php

namespace App\Services;

use App\Message;
use App\Restaurant;
use Nexmo\Laravel\Facade\Nexmo;

class SendSMSNotificationService
{
	private $message;

	public function __construct($message)
	{
		$this->message = $message;
	}

	public function send()
	{
		$notifaction = Nexmo::message()->send([
		    'to'   => '14845551244',
		    'from' => '16105552344',
		    'text' => $this->message,
		]);

		$response = $notifaction->getResponseData();
		$status = $response['messages'][0]['status'];

		$this->storeInDb($this->message, $status);
	}

	private function storeInDb(string $message, int $status)
	{
		Message::create([
			'text' => $message,
			'status' => $status,
		]);
	}
}
