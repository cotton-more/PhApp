<?php

namespace PhApp\Providers;

use Phalcon\Mvc\View;

class ViewServiceProvider extends AbstractServiceProvider
{
    protected $serviceName = 'view';

    /**
     * Register application service.
     *
     * @return mixed
     */
    public function register()
    {
        $this->getDI()->setShared(
            $this->serviceName,
            function () {
                /** @var \Phalcon\DiInterface $this */
                $config = $this->getShared('config')->application;

                $view = new View();
                $view->registerEngines([
                    '.volt' => $this->getShared('voltEngine', [$view, $this]),
                ]);
                $view->setViewsDir($config->viewsDir);
                $view->setMainView('main');

                return $view;
            }
        );
    }
}