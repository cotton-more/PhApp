<?php

namespace AppModule;

use Phalcon\Mvc\Router\Annotations;
use PhApp\Kernel\Kernel;
use PhApp\Providers\AbstractServiceProvider;

class AppModuleProvider extends AbstractServiceProvider
{
    /**
     * Register application service.
     *
     * @return mixed|void
     */
    public function register()
    {
        /** @var Kernel $kernel */
        $kernel = $this->getDI()->getShared('kernel');
        $kernel->addModule('app', namespace\Module::class, __DIR__.'/Module.php');

        /** @var Annotations $router */
        $router = $this->getDI()->getShared('router');
        $router->addModuleResource('app', 'AppModule\Http\Default');
    }
}