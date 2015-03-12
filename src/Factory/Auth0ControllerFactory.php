<?php
namespace Riskio\Auth0Module\Factory;

use Riskio\Auth0Module\Controller\Auth0Controller;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class Auth0ControllerFactory implements FactoryInterface
{
    /**
     * @param  ServiceLocatorInterface $serviceLocator
     * @return Auth0Service
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $serviceManager = $serviceLocator->getServiceLocator();

        $authService = $serviceManager->get('Riskio\Auth0Module\Authentication\AuthenticationService');
        $authAdapter = $serviceManager->get('Riskio\Auth0Module\Authentication\Adapter\Auth0Adapter');

        return new Auth0Controller($authService, $authAdapter);
    }
}
