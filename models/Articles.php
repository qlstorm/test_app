<?php

namespace models;

use DB;

class Articles {

    public static function getList($params = []) {
        $filter = [];

        if (isset($params['id'])) {
            $filter[] = 'articles.id = ' . (int)$params['id'];
        }

        if (isset($params['category'])) {
            $category = (int)$params['category'];

            $filter[] = "$category in (
                select category_id from articles_categories
                where
                    article_id = articles.id
            )";
        }

        $query = '
            select 
                articles.* 
            from articles
        ';

        if ($filter) {
            $query .= ' where ' . implode(' and ', $filter);
        }

        $order = ' order by articles.id desc';

        if (isset($params['order'])) {
            $order = ' order by ' . DB::escape($params['order']);
        }

        $query .= $order;

        $page = 0;

        $size = 20;

        if (isset($params['page'])) {
            $page = (int)$params['page'];
        }

        $limit = ' limit ' . ($page * $size) . ', ' . $size;

        if (isset($params['limit'])) {
            $limit = ' limit ' . (int)$params['limit'];
        }

        $query .= $limit;

        $result = DB::query($query);

        $list = [];

        while ($row = $result->fetch_assoc()) {
            $list[] = $row;
        }

        return $list;
    }
}
