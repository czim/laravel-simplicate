<?php
namespace Czim\Simplicate\Test;

use Czim\Simplicate\Providers\SimplicateServiceProvider;

abstract class TestCase extends \Orchestra\Testbench\TestCase
{

    /**
     * {@inheritdoc}
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('simplicate', include(realpath(dirname(__DIR__) . '/config/simplicate.php')));
    }

    /**
     * {@inheritdoc}
     */
    protected function getPackageProviders($app)
    {
        return [
            SimplicateServiceProvider::class,
        ];
    }

}
