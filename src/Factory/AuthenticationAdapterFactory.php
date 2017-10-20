<?php

declare(strict_types=1);

namespace Riskio\Auth0Module\Factory;

use Psr\Container\ContainerInterface;
use Riskio\Authentication\Auth0\Adapter;

final class AuthenticationAdapterFactory
{
    public function __invoke(ContainerInterface $container) : Adapter
    {
        $oauthProvider = $container->get('Riskio\Auth0Module\OAuth2\Client\Provider');

        return new Adapter($oauthProvider);
    }
}
