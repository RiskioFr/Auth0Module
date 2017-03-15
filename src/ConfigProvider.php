<?php
namespace Riskio\Auth0Module;

class ConfigProvider
{
    public function __invoke() : array
    {
        $config = (new Module())->getConfig();

        $config['dependencies'] = $config['service_manager'];
        unset($config['service_manager']);

        return $config;
    }
}
