<?php
namespace Riskio\Auth0Module\Factory;

use Riskio\Auth0Module\Client\Auth0Client;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class Auth0ClientFactory implements FactoryInterface
{
    /**
     * @param  ServiceLocatorInterface $serviceLocator
     * @return Auth0Client
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $auth0Sdk = $serviceLocator->get('Riskio\Auth0Module\Auth0Sdk');

        return new Auth0Client($auth0Sdk);
    }
}
