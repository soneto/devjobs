<?php

$app = require_once "bootstrap.php";
use Doctrine\ORM\Tools\Console\ConsoleRunner;

return ConsoleRunner::createHelperSet($app['orm.em']);