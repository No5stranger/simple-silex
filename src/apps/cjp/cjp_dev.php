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

$app->register(new ConfigServiceProvider(__DIR__.'/../../../config/settings.php'));

include 'service.php';
include 'middlewares.php';

//whoopsServiceProvider: php debug tool
$app->register(new WhoopsServiceProvider());

//php console
$app['php-console.settings'] = array(
  'sourcesBasePath' => dirname(__DIR__),
  'serverEncoding' => null,
  'headersLimit' => null,
  'password' => null,
  'enableSslOnlyMode' => false,
  'ipMasks' => array(),
  'isEvalEnabled' => false,
  'dumperLevelLimit' => 5,
  'dumperItemsCountLimit' => 100,
  'dumperItemSizeLimit' => 5000,
  'dumperDumpSizeLimit' => 500000,
  'dumperDetectCallbacks' => true,
  'detectDumpTraceAndSource' => false,
);

$app->register(new PhpConsole\Silex\ServiceProvider($app,
    new \PhpConsole\Storage\File(sys_get_temp_dir() . DIRECTORY_SEPARATOR . 'php-console.data') // any writable path
));

$app->register(new TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../../../templates'
));

$app['debug'] = true;

return $app;
