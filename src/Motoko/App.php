<?php

namespace Motoko;

class App {

    /**
     * @var Config
     */
    public $config;

    /**
     * @var Router
     */
    public $router;

    public function setRouter(Router $router) {
        $this->router = $router;
    }

    public function getRouter() {
        return $this->router;
    }

    /**
     * Set the application config class
     *
     * @param Config $config
     */
    public function setConfig(Config $config) {
        $this->config = $config;
    }

    /**
     *
     *
     * @return Config
     */
    public function getConfig() {
        return $this->config;
    }
}
