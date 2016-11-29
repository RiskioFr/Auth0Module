<?php
return [
    'authentication' => [
        'adapter' => 'Riskio\Auth0Module\AuthenticationAdapter',
    ],

    'auth0' => [
        'account'       => null,
        'token'         => null,
        'client_id'     => null,
        'client_secret' => null,
        'redirect_uri'  => null,
    ],

    'service_manager' => [
        'factories' => [
            'Riskio\Auth0Module\AuthenticationAdapter'  => 'Riskio\Auth0Module\Factory\AuthenticationAdapterFactory',
            'Riskio\Auth0Module\Auth0Management'        => 'Riskio\Auth0Module\Factory\Auth0ManagementFactory',
            'Riskio\Auth0Module\OAuth2\Client\Provider' => 'Riskio\Auth0Module\Factory\OAuthProviderFactory',
            'Riskio\Auth0Module\Options\Auth0Options'   => 'Riskio\Auth0Module\Factory\Auth0OptionsFactory',
        ],
    ],
];
