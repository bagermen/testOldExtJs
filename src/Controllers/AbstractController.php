<?php
namespace App\Controllers;

use Silex\Application;

abstract class AbstractController
{
    protected function render(Application $app, $templateName, $variables = array())
    {
        return $app['twig']->render($templateName, $variables);
    }

    protected function renderJson(Application $app, $templateName, $variables = array())
    {
        return $app['twig']->render($templateName, $variables);
    }
}