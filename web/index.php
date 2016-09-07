<?php
$loader = require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../bootstrap.php';

$app = new Silex\Application();
Bootstrap::run($app, $loader);

$app->get('/', 'App\Controllers\\Main::index')->bind('homepage');
$app->get('/calenders', 'App\Controllers\\Main::listGrid')->bind('list');
$app->post('/calenders', 'App\Controllers\\Main::create')->bind('create');
$app->put('/calenders/{id}', 'App\Controllers\\Main::update')->bind('update');
$app->delete('/calenders/{id}', 'App\Controllers\\Main::delete')->bind('delete');

$app->run();
