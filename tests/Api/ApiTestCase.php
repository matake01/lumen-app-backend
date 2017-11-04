<?php namespace Tests\Api;

use Tests\TestCase;

class ApiTestCase extends TestCase
{
    protected $loggedInUser;

    protected $headers;

    public function setUp()
    {
      parent::setUp();

      $this->loggedInUser = factory(\App\Models\User::class)->create();

      $this->headers = [
          'Authorization' => "Bearer {$this->loggedInUser->getTokenAttribute()}"
      ];
    }

    public function tearDown()
    {
      parent::tearDown();
    }

}
