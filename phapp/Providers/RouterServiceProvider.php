<?php

namespace PhApp\Providers;

use Phalcon\Mvc\Router;
use Phalcon\Mvc\Router\Annotations as RouterAnnotations;

class RouterServiceProvider extends AbstractServiceProvider
{
    protected $serviceName = 'router';

    /**
     * Register application service.
     */
    public function register()
    {
        $this->getDI()->setShared(
            $this->serviceName,
            function () {
                // Use the annotations router. We're passing false as we don't want the router to add its default patterns
                $router = new RouterAnnotations(false);

                $router->removeExtraSlashes(true);
                $router->setUriSource(Router::URI_SOURCE_SERVER_REQUEST_URI);

                return $router;
            }
        );
    }
}