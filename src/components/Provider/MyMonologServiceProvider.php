<?php
namespace Myele\Component\Provider;

use Silex\Application;
use Silex\ServiceProviderInterface;
use Silex\Provider\MonologServiceProvider;
use Monolog\Handler\ChromePHPHandler;

class MyMonologServiceProvider implements ServiceProviderInterface
{
    public function register(Application $app)
    {
        $app->register(new MonologServiceProvider(), array(
            'monolog.logfile' => __DIR__.'/../../../log/development.log'
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
