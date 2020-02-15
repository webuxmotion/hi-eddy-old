<?php

namespace core\base;

class View {

  public $route;
  public $controller;
  public $model;
  public $layout;
  public $view;
  public $prefix;
  public $data = [];
  public $meta = [];

  public function __construct($route, $layout = '', $view = '', $meta) {
    $this->route = $route;
    $this->controller = $route['controller'];
    $this->view = $view;
    $this->model = $route['controller'];
    $this->prefix = $route['prefix'];
    $this->meta = $meta;
    if ($layout === false) {
      $this->layout = false;
    } else {
      $this->layout = $layout ?: LAYOUT;
    }
  }

  public function render($data) {
    $viewFile = APP . "/views/{$this->prefix}{$this->controller}/{$this->view}.php";
    if (is_file($viewFile)) {
      ob_start();
      require_once $viewFile;
      $content = ob_get_clean();
    } else {
      throw new \Exception("File does <b>{$viewFile}</b> not exist");
    }
    if ($this->layout !== false) {
      $layoutFile = APP . "/views/layouts/{$this->layout}.php";
      if (is_file($layoutFile)) {
        require_once $layoutFile;
      } else {
        throw new \Exception("Layout does <b>{$this->layout}</b> not exist");
      }
    } else {
      echo $content;
    }
  }

  public function getMeta() {
    $res = "<title>" . $this->meta['title'] . "</title>";
    $res .= '<meta name="description" content="' . $this->meta['desc'] . '">';
    $res .= '<meta name="keywords" content="' . $this->meta['keywords'] . '">';
    return $res;
  }
}