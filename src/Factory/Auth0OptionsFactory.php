<?php
namespace Riskio\Auth0Module\Factory;

use Riskio\Auth0Module\Options\Auth0Options;

class Auth0OptionsFactory
{
    public function __invoke($serviceLocator)
    {
        $config = $serviceLocator->get('Config');

        if (isset($config['auth0']) && is_array($config['auth0'])) {
            $sdkOptions = $config['auth0'];
        } else {
            $sdkOptions = [];
        }

        return new Auth0Options($sdkOptions);
    }
}
