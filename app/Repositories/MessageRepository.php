<?php

namespace App\Repositories;

use App\Message;
use App\Interfaces\MessageInterface;
use Illuminate\Http\Request;
use Carbon\Carbon;

class MessageRepository implements MessageInterface
{
	public function getLastFiftyMessages()
	{
		return Message::limit(50)
			->orderBy('created_at', 'ASC')
			->get();
	}

	public function getNotDelivedMessages(Request $request)
	{
		$notDelivedMessages = Message::where('status', '<>', Message::$deliveredStatus)
			->where('created_at', '>=', Carbon::now()->subDay());

		if ($request->has('text')) {
			$notDelivedMessages->where('text', 'like', '%' . $request->get('text') . '%');
		}

		$notDelivedMessages = $notDelivedMessages->get();

		return $notDelivedMessages;
	}

	public function store(string $message, int $status)
	{
		Message::create([
			'text' => $message,
			'status' => $status,
		]);
	}
}
