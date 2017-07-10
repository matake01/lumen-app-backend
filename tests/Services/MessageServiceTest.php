<?php

use App\Services\MessageService;

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

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

    public function testFindMessageById()
    {
        $id = 1;
        $message = $this->service->find(1);

        $this->assertEquals(null, $message);
    }
}
