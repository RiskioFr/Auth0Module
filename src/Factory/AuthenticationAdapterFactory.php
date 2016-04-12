<?php
namespace Riskio\Auth0Module\Factory;

use Interop\Container\ContainerInterface;
use Riskio\Authentication\Auth0\Adapter;

class AuthenticationAdapterFactory
{
    public function __invoke(ContainerInterface $container) : Adapter
    {
        $oauthProvider = $container->get('Riskio\Auth0Module\OAuth2\Client\Provider');

        return new Adapter($oauthProvider);
    }
}
