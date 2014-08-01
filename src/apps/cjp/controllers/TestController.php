<?php
namespace Myele\Controller\Cjp;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

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
        $s_cookie = $request->cookies->get('SID');
        $ele_cookie = $request->cookies->get('eleme__eleme_cjp');
        d($ele_cookie);
        return $ele_cookie . '+++' . $s_cookie;
    }
}
