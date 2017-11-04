<?php namespace Tests\Api;

use Tests\TestCase;

class AuthTest extends TestCase
{

    /**
     * Test to login with invalid credentials
     *
     * @return void
     */
    public function testLoginWithWrongValidation()
    {
        $this->artisan('db:seed');
        $this->json('post', 'api/auth/login', [
            'email'     => $this->faker->email,
            'password'  => 'invalidpassword'
        ])->seeJson([
            'message'   => 'invalid_credentials'
        ])->assertResponseStatus(401);
    }
    /**
     * Test to login with valid credentials
     *
     * @return void
     */
    public function testCorrectLogin()
    {
        $email = $this->faker->email;
        $password = str_random(8);
        factory(\App\Models\User::class)->create([
            'email' => $email,
            'password' => app('hash')->make($password)
        ]);
        $this->json('post', 'api/auth/login', [
            'email'     => $email,
            'password'  => $password
        ])
        ->assertResponseOk();
    }

}
