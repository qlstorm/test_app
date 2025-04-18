<?php

namespace models;

use lib\Connection;

class Contacts {

    public static function getList() {
        $res = Connection::query('
            select * from contacts
        ');

        $rows = $res->fetch_all(MYSQLI_ASSOC);

        require 'views/contacts_list.php';
    }

    public static function add(int $id) {
        if ($_POST) {
            Connection::insert('contacts', $_POST);

            if ($id) {
                header('location: /contacts/list/' . $id);
            } else {
                header('location: /contacts/list');
            }

            exit;
        }

        $query = '
            select * from contacts
            where
                id = '  . $id;

        $row = Connection::query($query)->fetch_assoc();

        require 'views/contacts_add.php';
    }

    public static function view(int $id) {
        $query = '
            select * from contacts
            where
                id = '  . $id;

        $row = Connection::query($query)->fetch_assoc();

        $query = '
            select orders.* from contacts_orders
            left join orders on orders.id = contacts_orders.order_id
            where
                contact_id = ' . $id;

        $orders = Connection::query($query)->fetch_all(MYSQLI_ASSOC);

        require 'views/contacts_view.php';
    }

    public static function delete(int $id) {
        $query = '
            delete from contacts
            where
                id = '  . $id;

        Connection::query($query);

        $query = '
            delete from contacts_orders
            where
                contact_id = '  . $id;

        Connection::query($query);

        header('location: /contacts/list');
    }

    public static function addOrder(int $id) {
        if ($_POST) {
            $row = [
                'contact_id' => $id,
                'order_id' => (int)$_POST['order_id']
            ];

            Connection::insert('contacts_orders', $row);

            header('location: /contacts/list/' . $id);

            exit;
        }

        $res = Connection::query('
            select * from orders
            where
                id not in (
                    select order_id from contacts_orders
                    where
                        contact_id = ' . $id . '
                )
        ');

        $rows = $res->fetch_all(MYSQLI_ASSOC);

        require 'views/contacts_orders_add.php';
    }

    public static function deleteOrder(int $id, int $orderId) {
        $query = '
            delete from contacts_orders
            where
                contact_id = ' . $id . ' and
                order_id = ' . $orderId;

        Connection::query($query);

        header('location: /contacts/list/' . $id);
    }
}
