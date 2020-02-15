<?php

namespace core;

class Router {
  protected static $routes = [];
  protected static $route = [];

  public static function add($regexp, $route = []) {
    self::$routes[$regexp] = $route;
  }

  public static function getRoutes() {
    return self::$routes;
  }

  public static function getRoute() {
    return self::$route;
  }

  public static function dispatch($url) {
    if (self::matchRoute($url)) {
      $controller = 'app\controllers\\' . 
        self::$route['prefix'] . 
        self::$route['controller'] . 'Controller';
      if (class_exists($controller)) {
        $controllerObject = new $controller(self::$route);
        $action = self::$route['action'] . 'Action';
        if (method_exists($controllerObject, $action)) {
          $controllerObject->$action();
        } else {
          throw new \Exception("Method <b>{$action}</b> in $controller not found");
        }
      } else {
        throw new \Exception("Controller <b>{$controller}</b> not found");
      }
    } else {
      throw new \Exception('Page not found', 404);
    }
  }

  public static function matchRoute($url) {
    foreach (self::$routes as $pattern => $route) {
      if (preg_match("#{$pattern}#", $url, $matches)) {
        foreach ($matches as $k => $v) {
          if (is_string($k)) {
            $route[$k] = $v;
          }
        }
        if (empty($route['action'])) {
          $route['action'] = 'index';
        }
        if (!isset($route['prefix'])) {
          $route['prefix'] = '';
        } else {
          $route['prefix'] .= '\\';
        }
        $route['controller'] = self::upperCamelCase($route['controller']);
        $route['action'] = self::lowerCamelCase($route['action']);
        self::$route = $route;

        return true;
      }
    }
    return false;
  }

  protected static function upperCamelCase($str) {
    $str = str_replace('-', ' ', $str);
    $str = ucwords($str);
    $str = str_replace(' ', '', $str);
    return $str;
  }

  protected static function lowerCamelCase($str) {
    return lcfirst(self::upperCamelCase($str));
  }
}