<?php

use Silex\Application;
use GeckoPackages\Silex\Services\Config\ConfigServiceProvider;
use Dflydev\Provider\DoctrineOrm\DoctrineOrmServiceProvider;
use Silex\Provider\DoctrineServiceProvider;
use Doctrine\Common\Annotations\AnnotationRegistry;
use Saxulum\DoctrineOrmManagerRegistry\Provider\DoctrineOrmManagerRegistryProvider;
use Silex\Provider\ValidatorServiceProvider;
use Saxulum\Console\Provider\ConsoleProvider;
use Silex\Provider\TwigServiceProvider;

/**
 * Class Bootstrap
 */
class Bootstrap
{
    protected function __construct()
    {}

    public static function run(Application $app, $loader)
    {
        $self = new self();
        $self->bootYml($app);
        $self->bootDoctrine($app, $loader);
        $self->bootTwig($app);
        $self->bootClasses($app);
    }

    public function bootYml(Application $app)
    {
        $app->register(
            new ConfigServiceProvider(),
            array(
                'config.dir' => __DIR__.'/app',
                'config.format' => '%key%.%env%.yml',
                'config.env' => 'dev',
            )
        );
    }

    public function bootDoctrine(Application $app, $loader)
    {
        $app->register(new DoctrineServiceProvider(), $app['config']->get('db'));

        $app->register(new DoctrineOrmServiceProvider(), array(
            'orm.proxies_dir' => __DIR__.'/cache',
            'orm.em.options' => array(
                'mappings' => array(
                    // Using actual filesystem paths
                    array(
                        'type' => 'annotation',
                        'namespace' => 'App\Entities',
                        'path' => __DIR__.'/src/Entities',
                        'use_simple_annotation_reader' => false,
                    ),
                ),
            ),
        ));

        AnnotationRegistry::registerLoader(array($loader, 'loadClass'));

        $app->register(new ConsoleProvider());
        $app->register(new ValidatorServiceProvider());
        $app->register(new DoctrineOrmManagerRegistryProvider());

        /** @var \Doctrine\DBAL\Connection $conn */
        $conn = $app['doctrine']->getConnection();
        $conn->getDatabasePlatform()->registerDoctrineTypeMapping('enum', 'string');
    }

    public function bootTwig(Application $app)
    {
        $app->register(new TwigServiceProvider(), array(
            'twig.path' => __DIR__ . '/src/Views'
        ));
    }

    public function bootClasses(Application $app)
    {
        $app->register(new \App\Service\Provider\Grid());
    }
}
