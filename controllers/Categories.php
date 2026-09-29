<?php

namespace controllers;

class Categories {

    public static function index() {
        include 'views/categories.php';
    }

    public static function view(int $id) {
        $_GET['id'] = $id;

        include 'views/category.php';
    }
}
