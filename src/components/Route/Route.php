<?php
namespace Myele\Component\Route;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Silex\Route as BaseRoute;

class Route extends BaseRoute
{
    public function inApp()
    {
        return $this
            ->before(
                function (Request $request, Application $app) {
                    //do some thing before the request reach the controller
                    //e.g check user login
                    d('before request');
                }
            );
    }
}
