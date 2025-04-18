<?php

namespace models;

use lib\Connection;

class Orders {

    public static function getList() {
        $res = Connection::query('
            select * from orders
        ');

        $rows = $res->fetch_all(MYSQLI_ASSOC);

        require 'views/orders_list.php';
    }

    public static function add(int $id) {
        if ($_POST) {
            Connection::insert('orders', $_POST);

            if ($id) {
                header('location: /orders/list/' . $id);
            } else {
                header('location: /orders/list');
            }

            exit;
        }

        $query = '
            select * from orders
            where
                id = '  . $id;

        $row = Connection::query($query)->fetch_assoc();

        require 'views/orders_add.php';
    }

    public static function view(int $id) {
        $query = '
            select * from orders
            where
                id = '  . $id;

        $row = Connection::query($query)->fetch_assoc();

        $query = '
            select contacts.* from contacts_orders
            left join contacts on contacts.id = contacts_orders.contact_id
            where
                order_id = ' . $id;

        $contacts = Connection::query($query)->fetch_all(MYSQLI_ASSOC);

        require 'views/orders_view.php';
    }

    public static function delete(int $id) {
        $query = '
            delete from orders
            where
                id = '  . $id;

        Connection::query($query);

        $query = '
            delete from contacts_orders
            where
                order_id = '  . $id;

        Connection::query($query);

        header('location: /orders/list');
    }

    public static function addContact(int $id) {
        if ($_POST) {
            $row = [
                'contact_id' => (int)$_POST['contact_id'],
                'order_id' => $id,
            ];

            Connection::insert('contacts_orders', $row);

            header('location: /orders/list/' . $id);

            exit;
        }

        $res = Connection::query('
            select * from contacts
            where
                id not in (
                    select contact_id from contacts_orders
                    where
                        order_id = ' . $id . '
                )
        ');

        $rows = $res->fetch_all(MYSQLI_ASSOC);

        require 'views/orders_contacts_add.php';
    }

    public static function deleteContact(int $id, int $contactId) {
        $query = '
            delete from contacts_orders
            where
                contact_id = ' . $contactId . ' and
                order_id = ' . $id;

        Connection::query($query);

        header('location: /orders/list/' . $id);
    }
}
