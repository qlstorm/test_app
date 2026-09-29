<?php

class Application {

    public static function boot() {
        error_reporting(0);

        mysqli_report(0);

        if (!DB::getConnection()) {
            echo '<pre>';

            echo error_get_last()['message'] . "\n\n";

            echo 'No connection, update conf.php';

            echo '</pre>';

            exit;
        }

        error_reporting(E_ALL);

        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

        if (!DB::query("SHOW TABLES LIKE 'storm_app'")->fetch_assoc()) {
            DB::queryMulti(file_get_contents('db.sql'));
        }

        if (isset($_SERVER['REQUEST_URI'])) {
            Controller::index(array_values(array_filter(explode('/', explode('?', $_SERVER['REQUEST_URI'])[0]))));
        }
    }
}
