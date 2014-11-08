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
        // this call just before the route callback, and after the before before application middlerwares
        return $this
            ->before(
                function (Request $request, Application $app) {
                    //do some thing before the request reach the controller
                    //e.g check user login
                    d('before request');
                }
            );
    }

    public function cache($time)
    {
        return $this
            ->before(
                function (Request $request, Application $app) {
                    //unset(...) // remove the cache
                }
            )
            ->after(
                function (Request $request, Response $response) use ($time) {
                    if ($response->getStatusCode() === 200) {
                        $response->setTtl($time);
                    }
                }
            );
    }

    public function xml()
    {
        return $this
            ->before(
                function (Request $request, Application $app) {
                    return $app->json($request->getMethod());
                    //return $app->json($request->getRealMethod());
                    //return $app->json($request->isXmlHttpRequest());
                }
            );
    }
}
