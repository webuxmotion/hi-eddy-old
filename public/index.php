<?php

require_once dirname(__DIR__) . '/config/init.php';

use core\Hi;

new Hi();

throw new Exception('Page not found', 500);