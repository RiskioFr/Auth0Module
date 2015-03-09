<?php
namespace Riskio\Auth0Module\Factory;

use Riskio\Auth0Module\Options\Auth0Options;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class Auth0OptionsFactory implements FactoryInterface
{
    /**
     * @param  ServiceLocatorInterface $serviceLocator
     * @return Auth0
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config = $serviceLocator->get('Config');

        if (isset($config['auth0'])) {
            $sdkOptions = (array) $config['auth0'];
        } else {
            $sdkOptions = [];
        }

        return new Auth0Options($sdkOptions);
    }
}
