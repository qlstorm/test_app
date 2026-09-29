<?php

class DB {
    
    private static $connection;

    public static function getConnection() {
        if (!self::$connection) {
            require 'conf.php';

            self::$connection = mysqli_connect(
                $conf['host'],
                $conf['username'], 
                $conf['password'],
                $conf['database']
            );
        }

        return self::$connection;
    }

    public static function query($query) {
        $result = mysqli_query(self::getConnection(), $query);

        return $result;
    }

    public static function queryMulti($query) {
        $result = mysqli_multi_query(self::getConnection(), $query);

        while(mysqli_next_result(self::getConnection())) {
            
        }

        return $result;
    }

    public static function insert($table, $row, $trusted = false) {
        return self::insertBatch($table, array_keys($row), [$row], $trusted);
    }

    public static function insertBatch($table, $columns, $rows, $trusted = false) {
        $data = [];

        foreach ($rows as $row) {
            foreach ($row as &$value) {
                if ($value && !is_numeric($value)) {
                    if ($trusted) {
                        $value = '\'' . $value . '\'';
                    } else {
                        $value = '\'' . self::escape($value) . '\'';
                    }
                }

                if ($value == '') {
                    $value = 'null';
                }
            }

            $data[] = '(' . implode(', ', $row) . ')';
        }

        $dataString = implode(', ', $data);

        $columnsString = implode(', ', $columns);

        $query = "insert into `$table` ($columnsString) values $dataString";

        /*
        $values = [];

        foreach ($columns as $column) {
            $values[] = $column . ' = values(' . $column . ')';
        }

        $valuesString = implode(', ', $values);

        $query .= ' on duplicate key update ' . $valuesString;
        */

        return self::query($query);
    }

    public static function escape($string) {
        return mysqli_real_escape_string(self::getConnection(), $string);
    }

    public static function insertId() {
        return mysqli_insert_id(self::getConnection());
    }
}
