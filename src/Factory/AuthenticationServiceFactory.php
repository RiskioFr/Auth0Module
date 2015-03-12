<?php
namespace Riskio\Auth0Module\Factory;

use Zend\Authentication\AuthenticationService;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class AuthenticationServiceFactory implements FactoryInterface
{
    /**
     * {@inheritDoc}
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        /* @var $authAdapter \Zend\Authentication\Adapter\AdapterInterface */
        $authAdapter = $serviceLocator->get('Riskio\Auth0Module\Authentication\Adapter\Auth0Adapter');

        return new AuthenticationService(null, $authAdapter);
    }
}
