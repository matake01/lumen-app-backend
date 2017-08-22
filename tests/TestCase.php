<?php

abstract class TestCase extends Laravel\Lumen\Testing\TestCase
{
    /**
     *  The application instance
     */
    protected $app;

    /**
     * @var Faker\Generator
     */
    protected $faker;

    public function setUp()
    {

      $this->faker = Faker\Factory::create();
      parent::setUp();
    }

    public function tearDown()
    {
      parent::tearDown();

      Mockery::close();
    }

    /**
     * Creates the application.
     *
     * @return \Laravel\Lumen\Application
     */
    public function createApplication()
    {
        return require __DIR__.'/../bootstrap/app.php';
    }

    public function mock($class)
    {
      $mock = Mockery::mock($class);

      $this->app->instance($class, $mock);

      return $mock;
    }

}
