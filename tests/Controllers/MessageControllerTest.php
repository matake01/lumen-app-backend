<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class MessageControllerTest extends TestCase
{
    public function testGetMessageById()
    {
        $user = [];
        $this->json('GET', '/messages/1')->seeJsonEquals($user);
    }
}
