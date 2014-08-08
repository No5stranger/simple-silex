<?php
namespace Myele\Component\Provider;

use Silex\Application;
use Silex\ServiceProviderInterface;

use Myele\Component\Secret\Token;

class CsrfServiceProvider implements ServiceProviderInterface
{
    public function register(Application $app)
    {
        $app['csrf'] = $app->share(
            function ($app) {
                return new Token($app);
            }
        );
    }

    public function boot(Application $app)
    {
    }
}
