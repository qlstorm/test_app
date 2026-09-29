<?php

namespace models;

use DB;

class Categories {

    public static function getList($params = []) {
        $filter = [];

        if (isset($params['id'])) {
            $filter[] = 'categories.id = ' . (int)$params['id'];
        }

        if (isset($params['with_articles'])) {
            $filter[] = '(
                select count(*) from articles_categories where category_id = categories.id
            )';
        }

        if (isset($params['article'])) {
            $article = (int)$params['article'];

            $filter[] = "$article in (
                select article_id from articles_categories
                where
                    category_id = categories.id
            )";
        }

        $query = '
            select * from categories
        ';

        if ($filter) {
            $query .= ' where ' . implode(' and ', $filter);
        }

        $page = 0;

        $size = 20;

        if (isset($params['page'])) {
            $page = (int)$params['page'];
        }

        $query .= ' limit ' . ($page * $size) . ', ' . $size;

        $result = DB::query($query);

        $list = [];

        while ($row = $result->fetch_assoc()) {
            $list[] = $row;
        }

        return $list;
    }
}
