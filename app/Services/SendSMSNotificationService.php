<?php

namespace App\Services;

use App\Message;
use App\Restaurant;
use Nexmo\Laravel\Facade\Nexmo;
use App\Repositories\MessageRepository;

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

		(new MessageRepository())->store($this->message, $status);
	}
}
