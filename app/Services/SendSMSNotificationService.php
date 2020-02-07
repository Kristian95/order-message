<?php

namespace App\Services;

use App\Message;
use App\Restaurant;
use Nexmo\Laravel\Facade\Nexmo;

class SendSMSNotificationService
{
	public function send()
	{
		$message = 'Order from restaurant ' . Restaurant::NAME . 'delivery time ' . Restaurant::DELIVERY_TIME . ' mins';

		$notifaction = Nexmo::message()->send([
		    'to'   => '14845551244',
		    'from' => '16105552344',
		    'text' => $message,
		]);

		$response = $notifaction->getResponseData();
		$status = $response['messages'][0]['status'];

		$this->storeInDb($message, $status);
	}

	private function storeInDb(string $message, int $status)
	{
		Message::create([
			'text' => $message,
			'status' => $status,
		]);
	}
}
