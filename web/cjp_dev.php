<?php

require_once __DIR__.'/../vendor/autoload.php';

$app = require __DIR__.'/../src/apps/cjp/cjp_dev.php';
require_once __DIR__.'/../src/apps/cjp/routes.php';

$app->run();
