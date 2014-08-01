<?php

$app->get('/', function () use ($app) {
    return 'abc';
});

$app->get('/value/{pageName}', function ($pageName) {
    return $pageName;
})->value('pageName', 'index');

$app->get('/hello/{name}', function ($name) use ($app) {
    return 'Hello '.$app->escape($name).'! Best wish for you!';
});

$app->get('/json', function () use ($app) {
    $result = array('a' => 'cjp');
    return $app->json($result);
});

$app->get('/test', 'Myele\Controller\Cjp\TestController::callAction');

$app->get('/twig', 'Myele\Controller\Cjp\TestController::twigAction');

$app->get('/req', 'Myele\Controller\Cjp\TestController::logRequestAction');

$app->get('/cookie', 'Myele\Controller\Cjp\TestController::cookieAction');
