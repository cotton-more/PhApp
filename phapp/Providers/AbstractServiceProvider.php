<?php

namespace PhApp\Providers;

use Phalcon\Mvc\User\Component;

/**
 * \App\Providers\AbstractServiceProvider
 *
 * @package App\Providers
 */
abstract class AbstractServiceProvider extends Component implements ServiceProviderInterface
{
    /**
     * The Service name.
     * @var string
     */
    protected $serviceName;

    /**
     * Gets the Service name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->serviceName;
    }
}