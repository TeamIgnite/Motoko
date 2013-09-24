<?php

namespace Motoko\Tests;

use Motoko\Router;

class RouterTest extends AbstractTest {

    public function testAddRoute() {
        $router = $this->app->getRouter();

        //$router->add('GET', '/', )

    }

    public function testParsingActions() {
        $router = $this->app->getRouter();

        // Test non-namespaced controller
        $this->assertEquals(array(null, 'TestController', 'testAction'), $router->parseAction('TestController@testAction'));

        // Test namespaced controller
        $this->assertEquals(array('Test\\Namespace', 'TestController', 'testAction'), $router->parseAction('Test\\Namespace\\TestController@testAction'));

        // Test a screw up
        $this->assertFalse($router->parseAction('Jbgdbh**3hqk'));
    }

}
