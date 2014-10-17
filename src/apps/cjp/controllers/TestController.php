<?php
namespace Myele\Controller\Cjp;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Cookie;

use Myele\Component\Http\JsonResponse;

use Faker\Factory as fakerFactory;
use Faker\Provider\Base;

class TestController
{
    public function showAppAction(Application $app, Request $request)
    {
        d($app);
        return "This page is show what the app is.";
    }

    public function callAction(Application $app, Request $request)
    {
        $result = array(
            'big' => 'cxp',
            'small' => 'cjp'
        );
        d($result);
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
        $d = new Cookie("efg", "cxp", $dt);
        //dd($c);
        //d($c->getValue('abc'));
        $response = new Response(
            'content',
            200
        );
        $response->headers->setCookie($c);
        $response->headers->setCookie($d);
        //d($ele_cookie);
        return $response;
        //return $ele_cookie . '+++' . $s_cookie;
    }

    public function configAction(Application $app)
    {
        d($app['host']);
        return 'config_service_provider';
    }

    public function jsonAction(Application $app)
    {
        return new JsonResponse('hello cxp', 200);
    }

    public function abortAction(Application $app)
    {
        return $app->abort(404);
    }

    public function tokenAction(Application $app)
    {
        d($app['csrf']->check());
        return 'here test token';
    }

    public function formAction(Request $request, Application $app)
    {
        $data = array(
            'name' => 'Your name',
            'email' => 'Your email'
        );

        $form = $app['form.factory']->createBuilder('form', $data)
            ->add('name')
            ->add('email')
            ->add('gender', 'choice', array(
                'choices' => array(1 => 'mail', 2 => 'female'),
                'expanded' => true
            ))
            ->getForm();
        $form->handleRequest($request);

        if($form->isValid()) {
            $data = $form->getData();

            return $app->redirect('/');
        }

        return $app['twig']->render('form.twig', array('form' => $form->createView()));
        //return 'abc';
    }

    public function phpConsoleAction(Application $app, Request $request)
    {
        \PC::debug('hello cxp');
        return new JsonResponse('php console', 200);
    }

    public function postAction(Application $app)
    {
        print_r($_POST);
        return 1;
    }

    public function testRedirectAction(Application $app)
    {
        echo 'abc';
        return $app->redirect('/redirectResponse');
    }

    public function redirectDataAction(Application $app)
    {
        return 'a';
    }

    public function urlGeneratorTestAction(Application $app)
    {
        return $app['url_generator']->generate('test_cookie');
    }

    public function fakerAction(Application $app)
    {
        $faker = fakerFactory::create('zh_CN');
        $base = new Base($faker);
        d($base->lexify('???'));
        d($faker->name);
        d($faker);
        return '2B';
    }
}
