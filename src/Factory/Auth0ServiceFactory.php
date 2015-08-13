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
        $authService = $serviceLocator->get('Riskio\AuthenticationModule\AuthenticationService');

        return new Auth0Service($authService);
    }
}
