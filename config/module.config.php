<?php

use Auth0\SDK\API\Management as Auth0Management;
use Riskio\Auth0Module\Factory;
use Riskio\Auth0Module\Options\Auth0Options;
use Riskio\Authentication\Auth0\Adapter as Auth0AuthenticationAdapter;
use Riskio\OAuth2\Client\Provider\Auth0 as OAuthProvider;

return [
    'authentication' => [
        'adapter' => Auth0AuthenticationAdapter::class,
    ],

    'service_manager' => [
        'factories' => [
            Auth0AuthenticationAdapter::class => Factory\AuthenticationAdapterFactory::class,
            Auth0Management::class => Factory\Auth0ManagementFactory::class,
            OAuthProvider::class => Factory\OAuthProviderFactory::class,
            Auth0Options::class => Factory\Auth0OptionsFactory::class,
        ],
    ],
];
