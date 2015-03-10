<?php
namespace Riskio\Auth0Module\Factory;

use Auth0SDK\Auth0;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class Auth0SdkFactory implements FactoryInterface
{
    /**
     * @param  ServiceLocatorInterface $serviceLocator
     * @return Auth0
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $options = $serviceLocator->get('Riskio\Auth0Module\Options\Auth0Options');

        $params = $options->toArray();

        $auth0 = new Auth0($params);

        if (!empty($params['id_token'])) {
            $auth0->setIdToken($params['id_token']);
        }

        return $auth0;
    }
}
