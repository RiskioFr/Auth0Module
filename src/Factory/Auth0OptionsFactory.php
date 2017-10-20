<?php

declare(strict_types=1);

namespace Riskio\Auth0Module\Factory;

use Psr\Container\ContainerInterface;
use Riskio\Auth0Module\Options\Auth0Options;

final class Auth0OptionsFactory
{
    public function __invoke(ContainerInterface $container) : Auth0Options
    {
        $config = $container->get('config');

        if (isset($config['auth0']) && is_array($config['auth0'])) {
            $sdkOptions = $config['auth0'];
        } else {
            $sdkOptions = [];
        }

        return new Auth0Options($sdkOptions);
    }
}
