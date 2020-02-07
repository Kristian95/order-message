<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Message;
use Carbon\Carbon;
use App\Jobs\SendNotifications;

class NotificationController extends Controller
{
	/**
     * Show the resources.
     *
     * @return \Illuminate\Http\Response
   	 */
	public function index()
	{
		$messages = Message::limit(50)
			->orderBy('created_at', 'ASC')
			->get();

		$notDelivedMessages = Message::where('status', '<>', Message::$deliveredStatus)
			->where('created_at', '>=', Carbon::now()->subDay())
			->get();

		return view('welcome', compact('messages', 'notDelivedMessages'));
	}

	/**
     * Send notification.
     *
     * @return \Illuminate\Http\Response
     */
	public function send()
	{
		dispatch(new SendNotifications());

		return redirect()->route('get_notification');;
	}
}
