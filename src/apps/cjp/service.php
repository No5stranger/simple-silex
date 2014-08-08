<?php
$app->register(new \Myele\Component\Provider\SessionServiceProvider());

$app->register(new \Myele\Component\Provider\CsrfServiceProvider());

$app->mount('/test', new \Myele\Component\Provider\TestControllerProvider());
