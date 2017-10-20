<?php

use Riskio\Auth0Module\Factory;

return [
    'authentication' => [
        'adapter' => 'Riskio\Auth0Module\AuthenticationAdapter',
    ],

    'auth0' => [
        'account' => null,
        'token' => null,
        'client_id' => null,
        'client_secret' => null,
        'redirect_uri' => null,
    ],

    'service_manager' => [
        'factories' => [
            'Riskio\Auth0Module\AuthenticationAdapter' => Factory\AuthenticationAdapterFactory::class,
            'Riskio\Auth0Module\Auth0Management' => Factory\Auth0ManagementFactory::class,
            'Riskio\Auth0Module\OAuth2\Client\Provider' => Factory\OAuthProviderFactory::class,
            'Riskio\Auth0Module\Options\Auth0Options' => Factory\Auth0OptionsFactory::class,
        ],
    ],
];
