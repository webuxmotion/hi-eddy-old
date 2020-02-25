<?php

namespace app\widgets\menu;

class Menu {

    protected $data;
    protected $tree;
    protected $menuHtml;
    protected $tpl;
    protected $container = 'ul';
    protected $table = 'category';
    protected $cache = 3600;
    protected $cacheKey = 'hieddy_menu';
    protected $attrs = [];
    protected $prepend = '';

    public function __construct($options = []) {
        $this->tpl = __DIR__ . '/tpl/menu.php';
        $this->getOptions();
        $this->run();
    }

    protected function getOptions($options) {

    }

    protected function run() {
        
    }
}