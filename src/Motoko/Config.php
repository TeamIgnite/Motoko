<?php

namespace Motoko;


class Config {

    private $items;

    public function set($key, $value) {
        array_set($this->items, $key, $value);

        return $value;
    }

    public function get($key) {
        if (!$this->exists($key)) {
            return false;
        }

        return array_get($this->items, $key);
    }

    /**
     * Check if key exists
     *
     * @param $key
     *
     * @return bool
     */
    public function exists($key) {
        $item = array_get($this->items, $key);

        return isset($item);
    }


    // loadPhp, loadYaml, loadJson

    public function setFromArray($array) {
    }

    public function setFromYaml($yaml) {
    }

    public function setFromJson($json) {
    }
}
