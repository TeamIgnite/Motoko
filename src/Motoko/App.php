<?php

namespace Motoko;

class App {

	private $config;

    private $router;

    public function setRouter(Router $router) {
        $this->router = $router;
    }

    public function getRouter() {
        return $this->router;
    }

    public function setConfig(Config $config) {
    	$this->config = $config;
    }

    public function getConfig() {
    	return $this->config;
    }

}
