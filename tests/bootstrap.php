<?php
if(!function_exists('app_path')) {
    function app_path($path = '') {
        return getcwd() . '/tests/Motoko/Tests/app/' . $path;
    }
}

$autoloader = require(__DIR__ . '/../vendor/autoload.php');
$autoloader->add('Motoko\Tests', __DIR__);
