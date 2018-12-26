<?php


namespace App\Provider;

use AppBundle\Exchange\Adapter\ProviderInterface;

interface ExchangeAdapterInterface
{
    /**
     * Fetches exchange information client
     *
     * @return array
     */
    public function fetch();

    /**
     * Get provider
     *
     * @return ProviderInterface
     */
    public function getProvider();
}