<?php

namespace App\Services;

use App\Message;

class SendSMSNotificationService
{
	private $restourant = [
		'name' => 'La Scara',
		'delivery_time' => 50;
	];

	public function send()
	{
		$message = "Order from restourant {self::$restourant['name']} delivery time {self::$restourant['delivery_time']} mins";

		$notifaction = Nexmo::message()->send([
		    'to'   => '14845551244',
		    'from' => '16105552344',
		    'text' => $message,
		]);

		$this->storeInDb($message, $notifaction->getStatus());
	}

	private function storeInDb(string $message, int $status)
	{
		Message::create([
			'text' => $message,
			'status' => $notifaction->getStatus();
		]);
	}
}
