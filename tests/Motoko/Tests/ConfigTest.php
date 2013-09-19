<?php

namespace Motoko\Tests;


class ConfigTest extends AbstractTest {

    public function setUp() {
        parent::setUp();
    }

    public function testRegularOperations() {
        $config = $this->app->getConfig();

        $config->set('test.item', 'test');

        $this->assertEquals($config->get('test.item'), 'test');
    }

    public function testLoadArrayConfig() {

        $config = array(
            'test' => array(
                'item' => 'bar'
            )
        );

        $this->app->config->setFromArray($config);
        //$this->assertEquals('bar', $this->app->config->get('test.item'));
    }
}
