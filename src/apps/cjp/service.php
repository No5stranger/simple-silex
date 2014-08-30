<?php
$app->register(new Silex\Provider\FormServiceProvider());

$app->register(new \Myele\Component\Provider\SessionServiceProvider());

$app->register(new \Myele\Component\Provider\CsrfServiceProvider());

$app->register(new \Myele\Component\Provider\MyMonologServiceProvider());

$app->register(new Silex\Provider\HttpCacheServiceProvider(), array(
    'http_cache.cache_dir' => $app['http_cache.cache_dir']
));

$app->mount('/test', new \Myele\Component\Provider\TestControllerProvider());
