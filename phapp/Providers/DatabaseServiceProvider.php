<?php

namespace PhApp\Providers;

use Phalcon\Db\Adapter\Pdo\Mysql;

class DatabaseServiceProvider extends AbstractServiceProvider
{
    protected $serviceName = 'db';

    /**
     * Register application service.
     */
    public function register()
    {
        $this->getDI()->setShared(
            $this->serviceName,
            function () {
                /** @var \Phalcon\DiInterface $this */
                $connection = new Mysql($this->getShared('config')->database->toArray());

                return $connection;
            }
        );
    }
}