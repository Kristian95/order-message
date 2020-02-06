<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\SendSMSNotificationService;

class NotificationController extends Controller
{
	/**
     * Show the resources.
     *
     * @return \Illuminate\Http\Response
     */
	public function index()
	{

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
