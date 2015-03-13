<?php
namespace Riskio\Auth0Module\Factory;

use Riskio\OAuth2\Client\Provider\Auth0 as OAuthProvider;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class OAuthProviderFactory implements FactoryInterface
{
    /**
     * @param  ServiceLocatorInterface $serviceLocator
     * @return OAuthProvider
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        /* @var $options \Riskio\Auth0Module\Options\Auth0Options */
        $options = $serviceLocator->get('Riskio\Auth0Module\Options\Auth0Options');

        return new OAuthProvider([
            'account'      => $options->getAccount(),
            'clientId'     => $options->getClientId(),
            'clientSecret' => $options->getClientSecret(),
            'redirectUri'  => $options->getRedirectUri(),
        ]);
    }
}
