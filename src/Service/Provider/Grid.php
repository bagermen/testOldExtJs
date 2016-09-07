<?php

namespace App\Service\Provider;

use Pimple\Container;
use Silex\Application;
use Pimple\ServiceProviderInterface;

/**
 * Class Grid
 * @package App\Services\Provider
 */
class Grid implements ServiceProviderInterface
{
    /**
     * Registers services on the given container.
     *
     * This method should only be used to configure services and parameters.
     * It should not get services.
     *
     * @param Container $pimple A container instance
     */
    public function register(Container $pimple)
    {
        $pimple['site_grid'] = $pimple->factory(function() use ($pimple) {
            return new \App\Service\Grid();
        });
    }
}