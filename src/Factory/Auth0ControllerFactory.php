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

        $auth0Service = $serviceManager->get('Riskio\Auth0Module\Service\Auth0Service');

        return new Auth0Controller($auth0Service);
    }
}
