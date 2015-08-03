<?php
namespace Riskio\Auth0Module\Factory;

use Riskio\Auth0Sdk\Service\ConnectionService;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ConnectionServiceFactory implements FactoryInterface
{
    /**
     * @param  ServiceLocatorInterface $serviceLocator
     * @return ConnectionService
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $client = $serviceLocator->get('Riskio\Auth0Module\Client\Auth0Client');

        return new ConnectionService($client);
    }
}
