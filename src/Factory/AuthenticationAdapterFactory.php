<?php
namespace Riskio\Auth0Module\Factory;

use Riskio\Authentication\Auth0\Adapter;

class AuthenticationAdapterFactory
{
    public function __invoke($serviceLocator)
    {
        $oauthProvider = $serviceLocator->get('Riskio\Auth0Module\OAuth2\Client\Provider');

        return new Adapter($oauthProvider);
    }
}
