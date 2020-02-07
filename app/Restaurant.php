<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    const NAME = 'La Scara';
    const DELIVERY_TIME = 50;

    public function getMessage(): string
    {
    	return 'Order from restaurant ' . Restaurant::NAME . 'delivery time ' . Restaurant::DELIVERY_TIME . ' mins';
    }

    public function getMessageAfterDelivery(): string
    {
    	return 'Message after delivery';
    }
}
