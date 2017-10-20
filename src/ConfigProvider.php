<?php

declare(strict_types=1);

namespace Riskio\Auth0Module;

final class ConfigProvider
{
    public function __invoke() : array
    {
        $config = (new Module())->getConfig();

        $config['dependencies'] = $config['service_manager'];
        unset($config['service_manager']);

        return $config;
    }
}
