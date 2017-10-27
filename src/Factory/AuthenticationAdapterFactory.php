<?php

declare(strict_types=1);

namespace Riskio\Auth0Module\Factory;

use Psr\Container\ContainerInterface;
use Riskio\Authentication\Auth0\Adapter;
use Riskio\OAuth2\Client\Provider\Auth0 as OAuthProvider;

final class AuthenticationAdapterFactory
{
    public function __invoke(ContainerInterface $container) : Adapter
    {
        $oauthProvider = $container->get(OAuthProvider::class);

        return new Adapter($oauthProvider);
    }
}
