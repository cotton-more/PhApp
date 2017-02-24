<?php

namespace PhApp\Providers;

use Phalcon\DiInterface;
use Phalcon\Mvc\View\Engine\Volt;
use Phalcon\Mvc\ViewBaseInterface;

class VoltTemplateEngineServiceProvider extends AbstractServiceProvider
{
    protected $serviceName = 'voltEngine';

    public function register()
    {
        $this->getDI()->setShared(
            $this->serviceName,
            function (ViewBaseInterface $view, DiInterface $di = null) {
                /** @var \Phalcon\DiInterface $this */
                $voltConfig = $this->getShared('config')->volt;

                $volt = new Volt($view, $di);
                $volt->setOptions([
                    'compiledPath'      => $voltConfig->cacheDir,
                    'compiledSeparator' => $voltConfig->compiledSeparator
                ]);

                return $volt;
            }
        );
    }
}