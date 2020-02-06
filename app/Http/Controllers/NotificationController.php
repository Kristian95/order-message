<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\SendSMSNotificationService;
use App\Message;

class NotificationController extends Controller
{
	/**
     * Show the resources.
     *
     * @return \Illuminate\Http\Response
   	 */
	public function index()
	{
		$messages = Message::limit(50)->orderBy('created_at', 'ASC')->get();

		return view('welcome', compact('messages'));
	}

	/**
     * Send notification.
     *
     * @return \Illuminate\Http\Response
     */
	public function send()
	{
		(new SendSMSNotificationService())->send();
	}
}
