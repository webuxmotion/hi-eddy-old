<?php

require_once dirname(__DIR__) . '/config/init.php';

use core\Hi;
use core\Router;

new Hi();
debug(Router::getRoutes());