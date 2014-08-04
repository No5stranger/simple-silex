<?php
namespace Myele\Controller\Cjp;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Cookie;

class TestController
{
    public function callAction(Application $app, Request $request)
    {
        $result = array(
            'big' => 'cxp',
            'small' => 'cjp'
        );
        return $app->json($result);
    }

    public function twigAction(Application $app, Request $request)
    {
        return $app['twig']->render('a.html.twig', array('name' => 'cjp'));
    }

    public function logRequestAction(Application $app, Request $request)
    {
        print_r($request->server->get('HTTP_USER_AGENT'));
        print_r($request->getClientIp());
        //print_r($request->server);
        die();
    }

    public function cookieAction(Application $app, Request $request)
    {
        //if want to set cookie, stop d();
        $ele_cookie = $request->cookies->get('eleme__eleme_cjp');
        $dt = new \DateTime();
        $dt->modify("+1 month");
        //d($dt);
        $c = new Cookie("abc", "cjp", $dt);
        //d($c->getValue('abc'));
        $response = new Response(
            'content',
            200
        );
        $response->headers->setCookie($c);
        //d($ele_cookie);
        return $response;
        //return $ele_cookie . '+++' . $s_cookie;
    }
}
