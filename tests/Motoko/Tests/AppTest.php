<?php

namespace Motoko\Tests;


use Motoko\App;
use Motoko\Config;
use Motoko\Router;

class AppTest extends AbstractTest {

    public function testConfigInjection() {
        $config = new Config();
        $this->app->setConfig($config);

        $this->assertSame($config, $this->app->getConfig());
    }

    public function testRouterInjection() {
        $router = new Router();
        $this->app->setRouter($router);

        $this->assertSame($router, $this->app->getRouter());
    }

}
