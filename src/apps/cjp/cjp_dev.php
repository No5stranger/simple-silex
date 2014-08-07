<?php

use Silex\Application;

use Symfony\Component\Debug\ErrorHandler;
use Symfony\Component\Debug\ExceptionHandler;
use Whoops\Provider\Silex\WhoopsServiceProvider;
use Igorw\Silex\ConfigServiceProvider;
use Silex\Provider\TwigServiceProvider;

ErrorHandler::register();
ExceptionHandler::register();

$app = new Application();
$app['route_class'] = 'Myele\\Component\\Route\\Route';

include 'service.php';

//whoopsServiceProvider: php debug tool
$app->register(new WhoopsServiceProvider());

$app->register(new ConfigServiceProvider(__DIR__.'/../../../config/settings.php'));

$app->register(new TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../../../templates'
));

$app['debug'] = true;

return $app;
