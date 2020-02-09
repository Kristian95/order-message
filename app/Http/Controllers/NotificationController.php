<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Message;
use App\Restaurant;
use App\Interfaces\MessageInterface;
use App\Jobs\SendNotifications;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
	private $messageRepository;

	public function __construct(MessageInterface $messageRepository)
	{
		$this->messageRepository = $messageRepository;
	}
	/**
     * Show the resources.
     *
     * @return \Illuminate\Http\Response
   	 */
	public function index(Request $request)
	{
		$messages = $this->messageRepository->getLastFiftyMessages();

		$notDelivedMessages = $this->messageRepository->getNotDelivedMessages($request);

		return view('welcome', compact('messages', 'notDelivedMessages'));
	}

	/**
     * Send notification.
     *
     * @return \Illuminate\Http\Response
     */
	public function send()
	{
		$notificationMessage = (new Restaurant())->getMessage();
		$messageAfterDelivery = (new Restaurant())->getMessageAfterDelivery();

		dispatch(new SendNotifications($notificationMessage));

		// message 90 minutes after delivery time
		dispatch(new SendNotifications($messageAfterDelivery))->delay(now()->addMinutes(Restaurant::DELIVERY_TIME + 90));

		return redirect()->route('get_notification');
	}
}
