<?php

abstract class TestCase extends Laravel\Lumen\Testing\TestCase
{
    /**
     *  The application instance
     */
    protected $app;

    public function setUp() {
          $this->app = $this->createApplication();
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
}
