<?php

namespace Motoko;


class Config {

    private $items = array();

    public function set($key, $value) {
        array_set($this->items, $key, $value);

        return $value;
    }

    public function get($key = '') {
        if(empty($key)) {
            return $this->items;
        }

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
        $this->items = array_merge_recursive($array, $this->items);

        return $this->items;
    }

    public function setFromJson($json) {
        $array = json_decode($json, true);

        $this->items = array_merge_recursive($array, $this->items);

        return $this->items;
    }
}
