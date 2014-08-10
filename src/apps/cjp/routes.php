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
    return json_encode($result);
});

$app->match('/form', 'Myele\Controller\Cjp\TestController::formAction');

$app->get('/app', 'Myele\Controller\Cjp\TestController::showAppAction');

$app->get('/myjson', 'Myele\Controller\Cjp\TestController::jsonAction');

$app->get('/test', 'Myele\Controller\Cjp\TestController::callAction')
    ->inApp();

$app->get('/twig', 'Myele\Controller\Cjp\TestController::twigAction');

$app->get('/req', 'Myele\Controller\Cjp\TestController::logRequestAction');

$app->get('/cookie', 'Myele\Controller\Cjp\TestController::cookieAction');

$app->get('/config', 'Myele\Controller\Cjp\TestController::configAction');

$app->get('/abort', 'Myele\Controller\Cjp\TestController::abortAction');

$app->get('/token', 'Myele\Controller\Cjp\TestController::tokenAction');

