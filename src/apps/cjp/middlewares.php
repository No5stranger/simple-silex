<?php
use Silex\Application;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Cookie;

//TODO

//do something before controller executed
$app->before(
    function (Request $request) use ($app) {
        //here can do somthing like verify, redirect and so on.
        //d('before middlerwaes');
    }
);

//do something after the controller executed
$app->after(
    function (Request $request, Response $response) use ($app) {
        // here can do something like write cookie, clear the http cache and so on
        //d('after middlerwares');
    }
);

//do something when the response had sent to client
$app->finish(
    function (Request $request, Response $response) use  ($app) {
        //here can do something like write log, send email and so on
        //d('finish middlerwares');
    }
);

$app->error(
    function (\Exception $e, $code) use ($app) {
        switch ($code) {
            case 404:
                return '404 bad request';
            default:
                var_dump($e);
                return '500';
        }
    }
);
