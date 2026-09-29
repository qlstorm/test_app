<?php

class Controller {

    public static function index($params) {
        if (!$params) {
            return controllers\Categories::index();
        }

        if (is_numeric($params[0])) {
            return controllers\Articles::view($params[0]);
        }

        if ($params[0] == 'category') {
            return controllers\Categories::view($params[1]);
        }
    }
}
