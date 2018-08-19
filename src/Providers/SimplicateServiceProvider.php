<?php
namespace Czim\Simplicate\Providers;

use Czim\Simplicate\Contracts\Services\SimplicateServiceInterface;
use Czim\Simplicate\Services\SimplicateServiceFactory;
use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class SimplicateServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->bootConfig();
    }

    public function register()
    {
        $this->registerConfig()
             ->registerInterfaceBindings();
    }

    /**
     * @return $this
     */
    protected function registerConfig()
    {
        $this->mergeConfigFrom(
            realpath(dirname(__DIR__) . '/../config/simplicate.php'),
            'simplicate'
        );

        return $this;
    }

    /**
     * @return $this
     */
    protected function registerInterfaceBindings()
    {
        $this->app->bind(SimplicateServiceInterface::class, function ($app) {
            /** @var Application $app */
            return $app->make(SimplicateServiceFactory::class)->make();
        });

        return $this;
    }

    /**
     * @return $this
     */
    protected function bootConfig()
    {
        $this->publishes([
            realpath(dirname(__DIR__) . '/../config/simplicate.php') => config_path('simplicate.php'),
        ]);

        return $this;
    }

}
