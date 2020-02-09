<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface MessageInterface
{
	public function getLastFiftyMessages();

	public function getNotDelivedMessages(Request $request);
}
