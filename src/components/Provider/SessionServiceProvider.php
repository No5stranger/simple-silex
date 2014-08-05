<?php
namespace Myele\Component\Provider;

use Silex\Application;
use Silex\ServiceProviderInterface;

class SessionServiceProvider implements ServiceProviderInterface
{
    private $app;

    public function register(Application $app)
    {
        $app['boss'] = "cjptolovecxp";
    }

    public function boot(Application $app)
    {
        d($app['boss']);
    }
}
