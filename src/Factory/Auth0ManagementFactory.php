<?php

declare(strict_types=1);

namespace Riskio\Auth0Module\Factory;

use Auth0\SDK\API\Management;
use Interop\Container\ContainerInterface;
use Riskio\Auth0Module\Options\Auth0Options;

final class Auth0ManagementFactory
{
    public function __invoke(ContainerInterface $container) : Management
    {
        /* @var $options Auth0Options */
        $options = $container->get(Auth0Options::class);

        return new Management($options->getToken(), $options->getDomain());
    }
}
