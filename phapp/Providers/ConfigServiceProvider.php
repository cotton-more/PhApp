<?php

namespace PhApp\Providers;

use Phalcon\Config;

class ConfigServiceProvider extends AbstractServiceProvider
{
    /**
     * @var string
     */
    protected $serviceName = 'config';

    /**
     * Register application service.
     */
    public function register()
    {
        $this->getDI()->setShared(
            $this->serviceName,
            function () {
                $config = new Config();

                /** @var \Phalcon\DiInterface  $this */
                $rootPath = $this->getShared('kernel')->getRootDir();

                if (file_exists($rootPath . '/config/application.php')) {
                    $applicationConfig = new Config\Adapter\Php($rootPath.'/config/application.php');
                    $config->merge($applicationConfig);
                }

                return $config;
            }
        );
    }
}