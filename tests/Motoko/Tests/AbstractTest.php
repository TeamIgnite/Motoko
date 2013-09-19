<?php

namespace Motoko\Tests;


use Motoko\App;
use Motoko\Config;
use Motoko\Router;

abstract class AbstractTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var App
     */
    protected $app;

    protected function setUp() {
        $this->app = new App();
        $this->app->setConfig(new Config());
        $this->app->setRouter(new Router());
    }
}
