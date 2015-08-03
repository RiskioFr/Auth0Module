<?php
namespace Riskio\Auth0Module\Factory;

use Riskio\Auth0Module\Authentication\Adapter\Auth0Adapter;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class AuthenticationAdapterFactory implements FactoryInterface
{
    /**
     * @param  ServiceLocatorInterface $serviceLocator
     * @return Auth0Adapter
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $oauthProvider = $serviceLocator->get('Riskio\Auth0Module\OAuth2\Client\Provider');

        return new Auth0Adapter($oauthProvider);
    }
}
