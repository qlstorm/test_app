<?php

namespace controllers;

class Contacts {

    public static function index($id = 0) {
        \models\App::getContacts($id);
    }

    public static function add($id = 0) {
        \models\Contacts::add($id);
    }

    public static function delete($id = 0) {
        \models\Contacts::delete($id);
    }

    public static function addOrder($id) {
        \models\Contacts::addOrder($id);
    }

    public static function deleteOrder($id, $orderId) {
        \models\Contacts::deleteOrder($id, $orderId);
    }

    public static function list($id = 0) {
        if ($id) {
            return \models\Contacts::view($id);
        }

        \models\Contacts::getList();
    }
}
