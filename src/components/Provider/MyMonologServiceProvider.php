<?php
namespace Myele\Component\Provider;

use Silex\Application;
use Silex\ServiceProviderInterface;
use Silex\Provider\MonologServiceProvider;
use Monolog\Handler\ChromePHPHandler;
use Monolog\Logger;

class MyMonologServiceProvider implements ServiceProviderInterface
{
    public function register(Application $app)
    {
        $app->register(new MonologServiceProvider(), array(
            'monolog.logfile' => __DIR__.'/../../../log/development.log',
            'monolog.level' => Logger::WARNING
        ));

        $app['monolog'] = $app->share(
            $app->extend('monolog', function($monolog, $app) {
                //$monolog->pushHandler(new ChromePHPHandler());
                return $monolog;
        }));
    }

    public function boot(Application $app)
    {
    }
}
