<?php

namespace controllers;

use DB;

class Articles {

    public static function view(int $id) {
        $_GET['id'] = $id;

        DB::query('update articles set views = views + 1 where id = ' . $id);

        include 'views/article.php';
    }
}
