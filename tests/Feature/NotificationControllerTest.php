<?php

namespace Tests\Feature;

use Tests\TestCase;

class NotificationControllerTest extends TestCase
{
    /**
     * Test index page
     *
     * @return void
     */
    public function testIndexPage()
    {
        $this->get(route('get_notification'))
            ->assertStatus(200)
            ->assertViewHasAll(['messages', 'notDelivedMessages']);
    }

     /**
     * Test index page
     *
     * @return void
     */
    public function testSendSMS()
    {
        $dummyText = "Order from restaurant La Scaradelivery time 50 mins";

        $this->get(route('notification'))
            ->assertStatus(302)
            ->assertRedirect(route('get_notification'));

        $this->assertDatabaseHas(
            'messages',
            ['text' => $dummyText]
        );
    }
}
