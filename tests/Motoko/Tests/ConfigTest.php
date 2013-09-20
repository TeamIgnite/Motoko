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
        $config = $this->app->getConfig();

        $array = array(
            'test' => array(
                'item' => 'bar'
            )
        );

        $config->setFromArray($array);
        $this->assertEquals('bar', $config->get('test.item'));
    }

    public function testLoadJsonConfig() {
        $config = $this->app->getConfig();

        $json = '{"dwarfs": ["Bombur", "Balin", "Fili"]}';
        $config->setFromJson($json);

        $this->assertEquals(array('Bombur','Balin','Fili'), $config->get('dwarfs'));
    }
}
