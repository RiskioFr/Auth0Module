<?php
return [
    'auth0' => [
        'account'       => null,
        'token'         => null,
        'client_id'     => null,
        'client_secret' => null,
        'redirect_uri'  => null,
    ],

    'service_manager' => [
        'initializers' => [
            'auth0_client' => 'Riskio\Auth0Module\Client\Auth0ClientAwareInitializer',
        ],
        'invokables' => [
            'Riskio\Auth0Module\Service\ConnectionService' => 'Riskio\Auth0Module\Service\ConnectionService',
            'Riskio\Auth0Module\Service\UserService'       => 'Riskio\Auth0Module\Service\UserService',
            'Riskio\Auth0Module\Service\StatsService'      => 'Riskio\Auth0Module\Service\StatsService',
        ],
        'factories' => [
            'Riskio\Auth0Module\Authentication\Adapter\Auth0Adapter'  => 'Riskio\Auth0Module\Factory\Auth0AuthenticationAdapterFactory',
            'Riskio\Auth0Module\Authentication\AuthenticationService' => 'Riskio\Auth0Module\Factory\AuthenticationServiceFactory',
            'Riskio\Auth0Module\Client\Auth0Client'     => 'Riskio\Auth0Module\Factory\Auth0ClientFactory',
            'Riskio\Auth0Module\OAuth2\Client\Provider' => 'Riskio\Auth0Module\Factory\OAuthProviderFactory',
            'Riskio\Auth0Module\Options\Auth0Options'   => 'Riskio\Auth0Module\Factory\Auth0OptionsFactory',
            'Riskio\Auth0Module\Service\Auth0Service'   => 'Riskio\Auth0Module\Factory\Auth0ServiceFactory',
        ],
    ],

    'controllers' => [
        'factories' => [
            'Riskio\Auth0Module\Controller\Auth0' => 'Riskio\Auth0Module\Factory\Auth0ControllerFactory',
        ],
    ],

    'router' => [
        'routes' => [
            'auth0' => [
                'type'    => 'Literal',
                'priority' => 1000,
                'options' => [
                    'route'    => '/auth0',
                    'defaults' => [
                        '__NAMESPACE__' => 'Riskio\Auth0Module\Controller',
                        'controller'    => 'Index',
                        'action'        => 'index',
                    ],
                    'constraints' => [
                        'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                    ],
                ],
                'may_terminate' => true,
                'child_routes' => [
                    'callback' => [
                        'type'    => 'Literal',
                        'options' => [
                            'route'    => '/callback',
                            'defaults' => [
                                'controller' => 'auth0',
                                'action'     => 'callback',
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
];
