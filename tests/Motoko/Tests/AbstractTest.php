<?php

namespace Motoko\Tests;


use Motoko\App;

abstract class AbstractTest extends \PHPUnit_Framework_TestCase {

    protected $app;

    protected function setUp() {
        $this->app = new App();
    }

}
