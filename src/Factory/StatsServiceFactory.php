<?php
namespace Riskio\Auth0Module\Factory;

use Riskio\Auth0Sdk\Service\StatsService;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class StatsServiceFactory implements FactoryInterface
{
    /**
     * @param  ServiceLocatorInterface $serviceLocator
     * @return StatsService
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $client = $serviceLocator->get('Riskio\Auth0Module\Client\Auth0Client');

        return new StatsService($client);
    }
}
