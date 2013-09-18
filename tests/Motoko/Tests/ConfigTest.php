<?php

namespace Motoko\Tests;


class ConfigTest extends AbstractTest {

    public function setUp() {
    	parent::setUp();
    }

	public function testRegularOperations() {
		$config = $this->app->config;

		$config->set('test.item', 'test');

		$this->assertEquals($config->get('test.item'), 'test');
	}

}
