<?php
$app->register(new \Myele\Component\Provider\SessionServiceProvider());

$app->mount('/test', new \Myele\Component\Provider\TestControllerProvider());
