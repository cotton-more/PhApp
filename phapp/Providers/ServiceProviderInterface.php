<?php

namespace PhApp\Providers;

interface ServiceProviderInterface
{
    /**
     * Register application service.
     */
    public function register();

    /**
     * Gets the Service name.
     *
     * @return string
     */
    public function getName();
}