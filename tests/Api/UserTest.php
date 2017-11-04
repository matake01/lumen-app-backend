<?php namespace Tests\Api;

use Tests\Api\ApiTestCase;

class UserTest extends ApiTestCase
{

    public function setUp() {
      parent::setUp();

    }

    public function tearDown() {
      parent::tearDown();
    }

    /**
     * Test to login with invalid credentials
     *
     * @return void
     */
    public function testGetUser()
    {
        $this->json('get', 'api/auth/user', [], $this->headers)
        ->seeJson([
          'id' => $this->loggedInUser->id,
          'email' => $this->loggedInUser->email,
        ])
        ->assertResponseOk();
    }
}
