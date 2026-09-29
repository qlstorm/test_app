<?php

namespace controllers;

class Categories {

    public static function index() {
        include __DIR__ . '/../views/categories.php';
    }

    public static function view(int $id) {
        $_GET['id'] = $id;

        include __DIR__ . '/../views/category.php';
    }
}
