<?php

namespace models;

use lib\Connection;

class App {

    public static function index() {
        self::getOrders();
    }

    public static function getContacts(int $id = 0) {
        $query = '
            select * from contacts
        ';

        $list = Connection::query($query)->fetch_all(MYSQLI_ASSOC);

        $filter = [];

        if ($id) {
            $filter[] = 'id = ' . $id;
        }

        $query = '
            select * from contacts
        ';

        if ($filter) {
            $query .= "\n" . 'where ' . implode(' and ', $filter);
        }

        $query .= "\n" . 'limit 1';

        $row = Connection::query($query)->fetch_assoc();

        if (!$id) {
            $id = (int)$row['id'];
        }

        $query = '
            select orders.* from contacts_orders
            left join orders on orders.id = contacts_orders.order_id
            where
                contacts_orders.contact_id = ' . $id
        ;

        $rows = Connection::query($query)->fetch_all(MYSQLI_ASSOC);

        $rowNames = [
            'id' => 'id контакта',
            'name' => 'Имя',
            'surname' => 'Фамилия'
        ];

        $rowsNames = [
            'id' => 'id сделки'
        ];

        $type = 'contacts';

        $contactsActive = 'active';

        require 'views/index.php';
    }

    public static function getOrders(int $id = 0) {
        $query = '
            select * from orders
        ';

        $list = Connection::query($query)->fetch_all(MYSQLI_ASSOC);

        $filter = [];

        if ($id) {
            $filter[] = 'id = ' . $id;
        }

        $query = '
            select * from orders
        ';

        if ($filter) {
            $query .= "\n" . 'where ' . implode(' and ', $filter);
        }

        $query .= "\n" . 'limit 1';

        $row = Connection::query($query)->fetch_assoc();

        if (!$id) {
            $id = (int)$row['id'];
        }

        $query = '
            select contacts.* from contacts_orders
            left join contacts on contacts.id = contacts_orders.contact_id
            where
                contacts_orders.order_id = ' . $id
        ;

        $rows = Connection::query($query)->fetch_all(MYSQLI_ASSOC);

        $rowNames = [
            'id' => 'id сделки',
            'name' => 'Наименование',
            'summ' => 'Сумма'
        ];

        $rowsNames = [
            'id' => 'id контакта'
        ];

        $type = 'orders';

        $ordersActive = 'active';

        require 'views/index.php';
    }
}
