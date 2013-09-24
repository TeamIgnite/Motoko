<?php

namespace Motoko;


class Router {

    public $routes;

    /**
     * Add router
     *
     * @param string $method
     * @param string $path
     * @param string $controller
     * @param string $method
     */
    public function add($method = 'GET', $path, $cbOrAction) {
        if(is_callable($cbOrAction)) {
            // Callback

            return $this->bindCallback($method, $path, $cbOrAction());

        } else {
            // Controller / Action

            list($controller, $action) = $this->parseAction($cbOrAction);

            if(!method_exists($controller, $action)) {
                throw new \BadMethodCallException;
            }

            return $this->bindAction($method, $path, $controller, $action);
        }

    }

    /**
     * Bind a route to a callback
     *
     * @param string $method
     * @param string $path
     * @param Closure $callback
     *
     * @return bool
     */
    public function bindCallback($method, $path, $callback) {
        return false;
    }

    /**
     * Bind a route to a controller/action
     *
     * @param string $method
     * @param string $path
     * @param string $controller
     * @param string $action
     *
     * @return bool
     */
    public function bindAction($method, $path, $controller, $action) {
        return false;
    }

    /**
     * Parse an action to find the namespace, class and method of an action.
     *
     * @param string $action
     *
     * @return array|bool
     */
    public function parseAction($action) {
        $namespace = $class = $method = null;

        $parsed = explode('@', $action);
        if(!isset($parsed[1])) {
            return false;
        }

        if (strpos($parsed[0],'\\') !== false) {
            // If we have a namespace
            $namespaced = explode('\\', $parsed[0]);

            $parsed[0] = array_pop($namespaced);
            $namespace = implode('\\', $namespaced);
        }
        $class = $parsed[0];
        $method = $parsed[1];

        // namespace,class,method
        return array($namespace, $class, $method);
    }


}
