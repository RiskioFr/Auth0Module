<?php
namespace Riskio\Auth0Module\Client;

use Zend\ServiceManager\InitializerInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class Auth0ClientAwareInitializer implements InitializerInterface
{
    /**
     * @param Auth0ClientAwareInterface $instance
     * @param ServiceLocatorInterface $serviceLocator
     */
    public function initialize($instance, ServiceLocatorInterface $serviceLocator)
    {
        if ($instance instanceof Auth0ClientAwareInterface) {
            $instance->setAuth0Client($serviceLocator->get('Riskio\Auth0Module\Client\Auth0Client'));
        }
    }
}
