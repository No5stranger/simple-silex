<?php
namespace Myele\Component\Provider;

use Silex\Application;
use Silex\ControllerProviderInterface;

class TestControllerProvider implements ControllerProviderInterface
{
    public function connect(Application $app)
    {
        $controllers = $app['controllers_factory'];

        $controllers->get('/provider', function (Application $app) {
            d('reach controller provider');
            //this is controller, so must return something
            return "this is controller, so must return something";
        });

        return $controllers;
    }
}
