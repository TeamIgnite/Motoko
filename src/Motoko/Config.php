<?php

namespace Motoko;


class Config {

	private $items;

	public function set($key, $value) {
		array_set($this->items, $key, $value);
	}

	public function get($key) {
        return array_get($this->items, $key);
	}

	public function exists($key) {

	}


    // loadPhp, loadYaml, loadJson


}
