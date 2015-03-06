<?php
namespace Riskio\Auth0Module\Factory;

use Riskio\Auth0Module\Service\Auth0Service;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class Auth0ServiceFactory implements FactoryInterface
{
    /**
     * @param  ServiceLocatorInterface $serviceLocator
     * @return Auth0Service
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $auth0Sdk = $serviceLocator->get('Riskio\Auth0Module\Auth0Sdk');

        return new Auth0Service($auth0Sdk);
    }
}
