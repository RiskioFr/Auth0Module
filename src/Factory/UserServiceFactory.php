<?php
namespace Riskio\Auth0Module\Factory;

use Riskio\Auth0Sdk\Service\UserService;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class UserServiceFactory implements FactoryInterface
{
    /**
     * @param  ServiceLocatorInterface $serviceLocator
     * @return UserService
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $client = $serviceLocator->get('Riskio\Auth0Module\Client\Auth0Client');

        return new UserService($client);
    }
}
