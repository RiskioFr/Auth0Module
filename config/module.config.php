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
        'invokables' => [
            'Riskio\Auth0Module\Service\ConnectionService' => 'Riskio\Auth0Sdk\Service\ConnectionService',
            'Riskio\Auth0Module\Service\UserService'       => 'Riskio\Auth0Sdk\Service\UserService',
            'Riskio\Auth0Module\Service\StatsService'      => 'Riskio\Auth0Sdk\Service\StatsService',
        ],
        'factories' => [
            'Riskio\Auth0Module\AuthenticationAdapter'  => 'Riskio\Auth0Module\Factory\AuthenticationAdapterFactory',
            'Riskio\Auth0Module\Client\Auth0Client'     => 'Riskio\Auth0Module\Factory\Auth0ClientFactory',
            'Riskio\Auth0Module\OAuth2\Client\Provider' => 'Riskio\Auth0Module\Factory\OAuthProviderFactory',
            'Riskio\Auth0Module\Options\Auth0Options'   => 'Riskio\Auth0Module\Factory\Auth0OptionsFactory',
            'Riskio\Auth0Module\Service\Auth0Service'   => 'Riskio\Auth0Module\Factory\Auth0ServiceFactory',
        ],
    ],
];
