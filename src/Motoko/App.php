<?php

namespace Motoko;

class App {

    protected $router;

    public function setRouter(Router $router) {
        $this->router = $router;
    }

    public function getRouter() {
        return $this->router;
    }

}
