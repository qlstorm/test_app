<?php

namespace controllers;

class Orders {

    public static function index($id = 0) {
        \models\App::getOrders($id);
    }

    public static function add($id = 0) {
        \models\Orders::add($id);
    }

    public static function delete($id = 0) {
        \models\Orders::delete($id);
    }

    public static function addContact($id) {
        \models\Orders::addContact($id);
    }

    public static function deleteContact($id, $contactId) {
        \models\Orders::deleteContact($id, $contactId);
    }

    public static function list($id = 0) {
        if ($id) {
            return \models\Orders::view($id);
        }

        \models\Orders::getList();
    }
}
