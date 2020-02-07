<?php

namespace App\Services;

use App\Message;
use Nexmo\Laravel\Facade\Nexmo;

class SendSMSNotificationService
{
	private static $restaurant = [
		'name' => 'La Scara',
		'delivery_time' => 50,
	];

	public function send()
	{
		$message = 'Order from restaurant' . self::$restaurant['name'] . 'delivery time' . self::$restaurant['delivery_time'] . ' mins';

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
