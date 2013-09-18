<?php

namespace Motoko\Tests;


use Motoko\App;
use Motoko\Config;

abstract class AbstractTest extends \PHPUnit_Framework_TestCase {

    protected $app;

    protected function setUp() {
        $this->app = new App();
        $this->app->setConfig(new Config());
    }

}
