<?php
return [
    'auth0' => [
        'domain'        => 'riskio.auth0.com',
        'client_id'     => '8gSLxUox6sUGWb2fhrkdAxS47CLx3Toy',
        'client_secret' => 'n6f3TA2b2HU76RuY-hhbF4PVJpM0XKih2Ay9W6ZnDdKELSFM8EOh2HY_HmdEBXBV',
        'redirect_uri'  => 'http://localhost:CHANGE-TO-YOUR-PORT/callback.php',
    ],

    'service_manager' => [
        'factories' => [
            'Riskio\Auth0Module\Auth0Sdk'             => 'Riskio\Auth0Module\Factory\Auth0SdkFactory',
            'Riskio\Auth0Module\Service\Auth0Service' => 'Riskio\Auth0Module\Factory\Auth0ServiceFactory',
        ],
    ],
];
