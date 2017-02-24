<?php

namespace PhApp\Kernel;

use Phalcon\Di\FactoryDefault;
use Phalcon\Mvc\Application;
use PhApp\Providers\AbstractServiceProvider;

class Kernel
{
    /**
     * @var \Phalcon\DiInterface
     */
    private $di;

    /**
     * @var Application
     */
    private $app;

    /**
     * @var array
     */
    private $modules = [];

    /**
     * @var string
     */
    protected $rootDir;

    public function __construct()
    {
        $this->rootDir = $this->getRootDir();

        $this->di = new FactoryDefault();

        $this->di->setShared('kernel', $this);

        /** @var AbstractServiceProvider $provider */
        foreach ($this->registerProviders() as $provider) {
            $provider->setDI($this->di);
            $provider->register();
        }

        $this->app = new Application($this->di);

        $this->app->registerModules($this->modules);

        $this->di->setShared('app', $this->app);
    }

    public function registerProviders(): array
    {
        return [];
    }

    public function addModule($name, $className, $path)
    {
        $this->modules[$name] = [
            'className' => $className,
            'path' => $path,
        ];
    }

    /**
     * @return bool|\Phalcon\Http\ResponseInterface
     */
    public function run()
    {
        if ($this->app instanceof Application) {
            return $this->app->handle()->send();
        }

        return $this->app->handle();
    }

    /**
     * @return string
     */
    public function getRootDir(): string
    {
        if (null === $this->rootDir) {
            $r = new \ReflectionObject($this);
            $this->rootDir = dirname($r->getFileName());
        }

        return $this->rootDir;
    }
}