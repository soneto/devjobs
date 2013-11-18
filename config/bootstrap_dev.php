<?php
$app = require_once __DIR__ . "/bootstrap.php";

use Whoops\Provider\Silex\WhoopsServiceProvider;
use Silex\Provider\DoctrineServiceProvider;

$app['debug'] = true;

if ($app['debug']) {
    $app->register(new WhoopsServiceProvider);
}

return $app;
