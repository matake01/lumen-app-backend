<?php namespace Tests;

use Mockery;

use Laravel\Lumen\Testing\DatabaseMigrations;

abstract class TestCase extends \Laravel\Lumen\Testing\TestCase
{

    use DatabaseMigrations, CreatesApplication;

    protected $faker;

    public function setUp()
    {
      parent::setUp();

      $this->faker = \Faker\Factory::create();
    }

    public function tearDown()
    {
      parent::tearDown();

      Mockery::close();
    }

    public function mock($class)
    {
      $mock = Mockery::mock($class);

      $this->app->instance($class, $mock);

      return $mock;
    }

}
