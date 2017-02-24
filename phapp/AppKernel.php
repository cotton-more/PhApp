<?php

namespace PhApp;

use PhApp\Kernel\Kernel;

/**
 * Class AppKernel
 * @package PhApp
 */
class AppKernel extends Kernel
{
    public function registerProviders(): array
    {
        $providers = [
            new Providers\ConfigServiceProvider(),
            new Providers\UrlResolverServiceProvider(),
            new Providers\RouterServiceProvider(),
            new Providers\ViewServiceProvider(),
            new Providers\VoltTemplateEngineServiceProvider(),
            new Providers\DatabaseServiceProvider(),

            new AppModule\AppModuleProvider(),
        ];

        return $providers;
    }
}
