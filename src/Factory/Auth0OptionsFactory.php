<?php

declare(strict_types=1);

namespace Riskio\Auth0Module\Factory;

use Psr\Container\ContainerInterface;
use Riskio\Auth0Module\Exception\InvalidConfigException;
use Riskio\Auth0Module\Options\Auth0Options;

final class Auth0OptionsFactory
{
    public function __invoke(ContainerInterface $container) : Auth0Options
    {
        $config = $container->get('config');

        if (!isset($config['auth0']) || !is_array($config['auth0'])) {
            throw new InvalidConfigException('auth0');
        }
        if (!isset($config['auth0']['account']) || !is_string($config['auth0']['account'])) {
            throw new InvalidConfigException('auth0.account');
        }
        if (!isset($config['auth0']['token']) || !is_string($config['auth0']['token'])) {
            throw new InvalidConfigException('auth0.token');
        }
        if (!isset($config['auth0']['client_id']) || !is_string($config['auth0']['client_id'])) {
            throw new InvalidConfigException('auth0.client_id');
        }
        if (!isset($config['auth0']['client_secret']) || !is_string($config['auth0']['client_secret'])) {
            throw new InvalidConfigException('auth0.client_secret');
        }
        if (!isset($config['auth0']['redirect_uri']) || !is_string($config['auth0']['redirect_uri'])) {
            throw new InvalidConfigException('auth0.redirect_uri');
        }

        return new Auth0Options($config['auth0']);
    }
}
