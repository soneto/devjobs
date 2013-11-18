<?php
require_once __DIR__ . "/../vendor/autoload.php";

use Dflydev\Silex\Provider\DoctrineOrm\DoctrineOrmServiceProvider;
use Silex\Provider\DoctrineServiceProvider;
use Silex\Application;

$app = new Application;

$app->register(new DoctrineServiceProvider, array(
    "db.options" => array(
        'driver'    => 'pdo_mysql',
        'host'      => 'localhost',
        'dbname'    => 'soneto_jobs',
        'user'      => 'root',
        'password'  => 'root',
        'charset'   => 'utf8',
    ),
));

$app->register(new DoctrineOrmServiceProvider, array(
    "orm.proxies_dir" => __DIR__."/../var/doctrine/proxy",
    "orm.em.options" => array(
        "mappings" => array(
            array(
                "type" => "annotation",
                "namespace" => "Soneto\Jobs\Entities",
                "path" => __DIR__."/../src"
            )
        ),
    ),
));

return $app;
