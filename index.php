<?php

use lib\Init;

function autoload($className) {
    $filepath = str_replace('\\', '/', $className) . '.php';

    if (is_file($filepath)) {
        include $filepath;
    }
}

spl_autoload_register('autoload');

$controller = 'Index';

$action = 'index';

$params = [];

if (isset($_SERVER['REQUEST_URI'])) {
    $params = explode('/', $_SERVER['REQUEST_URI']);

    unset($params[0]);

    if ($params[1] && class_exists('controllers\\' . ucfirst($params[1]))) {
        $controller = $params[1];

        unset($params[1]);
    }

    if (isset($params[2]) && method_exists('controllers\\' . ucfirst($controller), $params[2])) {
        $action = $params[2];

        unset($params[2]);
    }
}

Init::init();

call_user_func_array("controllers\\$controller::$action", $params);
