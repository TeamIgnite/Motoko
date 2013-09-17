<?php

namespace Motoko\Tests;


use Motoko\Router;

class AppTest extends AbstractTest {

    public function testAppInitialization() {

    }

    public function testRouterInjection() {

        $router = new Router();
        $this->app->setRouter($router);

        $this->assertSame($router, $this->app->getRouter());

    }

}
