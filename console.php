<?php
$loader = require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/bootstrap.php';

$app = new Silex\Application();
Bootstrap::run($app, $loader);

$app->boot();
$app['console']->run();