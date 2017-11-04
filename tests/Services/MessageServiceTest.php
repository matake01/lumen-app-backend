<?php

use App\Services\MessageService;
use App\Models\Message;

use Tests\TestCase;

class MessageServiceTest extends TestCase
{
    /**
     *  The message service instance
     */
    protected $service;

    public function setUp()
    {
        parent::setUp();

        $this->service = $this->app->make(MessageService::class);
    }

    public function tearDown()
    {
      parent::tearDown();
    }

    public function testFindMessageById()
    {
        $id = 1;
        $message = $this->service->find(1);

        $this->assertEquals(null, $message);
    }

    public function testMockMessage()
    {
        $message = $this->mock(Message::class);
        var_dump($message);
        $this->assertTrue(true);
    }
}
