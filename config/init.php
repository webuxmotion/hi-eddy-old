<?php

define("DEBUG",  1);
define("ROOT",   dirname(__DIR__));
define("WWW",    ROOT . '/public');
define("APP",    ROOT . '/app');
define("CORE",   ROOT . '/core');
define("LIBS",   ROOT . '/core/libs');
define("CACHE",  ROOT . '/tmp/cache');
define("CONF",   ROOT . '/config');
define("LAYOUT", "default");

require_once LIBS . '/functions.php';

define("PATH", getAppPath());
define("ADMIN", PATH . '/admin');

require_once ROOT . '/vendor/autoload.php';