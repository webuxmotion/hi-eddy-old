<?php

namespace app\models;

use core\Hi;

class Breadcrumbs 
{
    public static function getBreadcrumbs($category_id, $name = '') {
        $cats = Hi::$eddy->getProperty('cats');
        $breadcrumbs_array = self::getParts($cats, $category_id);
        $breadcrumbs = "<ul>";
        $breadcrumbs .= "<li><a href='" . PATH . "'>Main page</a></li>";
        if ($breadcrumbs_array) {
            foreach ($breadcrumbs_array as $alias => $title) {
                $breadcrumbs .= "<li><a href='" . PATH . "/category/{$alias}'>{$title}</a></li>";
            }
        }
        if ($name) {
            $breadcrumbs .= "<li>$name</li>";
        }
        $breadcrumbs .= "</ul>";
        return $breadcrumbs;
    }

    public static function getParts($cats, $id) {
        if (!$id) return false;
        $breadcrumbs = [];
        foreach ($cats as $k => $v) {
            if (isset($cats[$id])) {
                $breadcrumbs[$cats[$id]['alias']] = $cats[$id]['title'];
                $id = $cats[$id]['parent_id'];
            } else break;
        }
        return array_reverse($breadcrumbs, true);
    }
}